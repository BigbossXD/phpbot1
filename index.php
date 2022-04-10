<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<style>
    .tickerBox {
        margin: 2px;
        padding: 2px;
        border: 1px solid red;
    }
</style>

<body>

    <h1>Hello, Crypto!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <div class="container">
        <div class="row" id="renderData">

        </div>
    </div>

</body>

</html>

<script>
    const BASE_URL = "https://api.bitkub.com";
    async function getMarketTicker() {
        try {
            const url = BASE_URL + "/api/market/ticker";
            const response = await axios.get(url, {
                headers: {
                    "Cache-Control": "no-cache"
                },
            });
            console.log(response.data);
            return response.data;
        } catch (error) {
            return error.message;
        }
    }

    const initData = async () => {
        const result = await getMarketTicker();
        const results = Object.entries(result);
        var str = '';
        results.map((val) => {
            str = str + `<div class="col-3">`;
            str = str + `<div class="tickerBox">`;
            str = str + `<div>Name:` + val[0] + `</div>`;
            str = str + ` <div>Last:` + val[1].last + `</div>`;
            str = str + `</div>`;
            str = str + `</div>`;
        })
        var div = document.getElementById('renderData');
        div.innerHTML = str;
    };
    initData(); 
    setInterval(initData, 5000);
</script>