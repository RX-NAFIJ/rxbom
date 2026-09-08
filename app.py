import asyncio
import aiohttp
from flask import Flask, request, jsonify

app = Flask(__name__)

# Base API URL pattern (api1.php through api75.php)
BASE_URL = "https://rxbom-api.onrender.com/api{}.php"

async def fetch_api(session, api_num, phone):
    """Sends an asynchronous GET request to a single API endpoint."""
    url = BASE_URL.format(api_num)
    params = {"phone": phone}
    
    try:
        # Fast timeout settings (5 seconds connection/response timeout)
        timeout = aiohttp.ClientTimeout(total=5)
        async with session.get(url, params=params, timeout=timeout) as response:
            try:
                # Attempt to parse response as JSON
                data = await response.json()
            except Exception:
                # Fallback to plain text if response is not JSON
                data = await response.text()
                
            return {
                "api": f"api{api_num}.php",
                "status_code": response.status,
                "response": data
            }
    except Exception as e:
        return {
            "api": f"api{api_num}.php",
            "status_code": None,
            "error": str(e)
        }

@app.route("/send", methods=["GET"])
async def send_requests():
    phone = request.args.get("phone")
    
    if not phone:
        return jsonify({"error": "Missing required 'phone' parameter"}), 400

    # Configure connection pool for high concurrency speed
    connector = aiohttp.TCPConnector(limit=100)
    async with aiohttp.ClientSession(connector=connector) as session:
        # Create asynchronous tasks for api1.php through api75.php
        tasks = [fetch_api(session, i, phone) for i in range(1, 76)]
        
        # Execute all 75 HTTP requests simultaneously
        results = await asyncio.gather(*tasks)

    return jsonify({
        "phone": phone,
        "total_sent": len(results),
        "results": results
    })

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)
