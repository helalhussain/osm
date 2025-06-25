<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
</head>
<body>
<!------Start Square--HTML----------->
<form id="payment-form">
    <div id="card-container"></div>
    <button id="card-button" type="button">Pay</button>
</form>
<!------End Square--HTML----------->
</body>
</html>

<!------Start Square-- js--Front----------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://web.squarecdn.com/v1/square.js"></script>

<script>
    async function initializeCard() {
        const payments = Square.payments("{{ env('SQUARE_APPLICATION_ID') }}", "{{ env('SQUARE_LOCATION_ID') }}");
        const card = await payments.card();
        await card.attach("#card-container");

        document.getElementById("card-button").addEventListener("click", async () => {
            const result = await card.tokenize();
            if (result.status === "OK") {
                fetch("/process-payment", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ token: result.token, amount: 100 }) // $1.00
                })
                .then(response => response.json())
                .then(data => console.log(data));
            }
        });
    }
    initializeCard();
</script>
<!------End Square-- js--Front----------->
