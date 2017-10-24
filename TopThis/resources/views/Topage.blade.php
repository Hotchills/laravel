<html lang="en">
   <head>
      <title>Do your top</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
      <link rel="stylesheet" href="/css/menu.css">
      <meta name="viewport" coSntent="width=device-width, initial-scale=1">
   </head> 


<body>

         <h3>List of Current tops </h3>
         <ol>
            {!!$email!!}
         </ol>

         <h3> Add New top </h3>

         <h3>Please insert the informations bellow:</h3>

         <form method="post" action="/topage">
            {{csrf_field() }}
            <input type="text" name="title">
            <textarea  name="body"></textarea>
            <button type="submit">Submit</button>
         </form>



  </body>

</html>

