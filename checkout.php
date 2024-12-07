<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago del producto</title>

    <script src="https://www.paypal.com/sdk/js?client-id-AbvfpsZ2jmXJiyDehVwLeUDCD6eoXPrZijm_DBDSL9MwwT1YezDPBtFSD8hd55ms5pigXyWPLrd2jjjZ"></script>
</head>
<body>
    
  <div id="paypal-button-container"></div>

  <script>
      paypal.Buttons({
          style:{
               color: 'red',
               shape: 'pill',
               label: 'pay'

          },
          createOrder: function(data, actions){
             return actions.order.create({
                 purchase_units: [{
                     amount: {
                         value: 100
                     }
                 }]
             });
          },
          
          onApprove: function(data, actions){
             actions.order.capture().then(function(detalles){
                  console.log(detalles);
             });
          },
          
          onCancel: function(data){
              alert("Su pago ha sido cancelado");
              console.log(data);
          }
      }).render('#paypal-button-container');
  </script>
</body>
</html>