<h1>Hi, {{ $name }}</h1>
<p>OTP: {{$otp}}</p>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  width: 500px;
  height: 100%;
  margin-left: 30%;
  margin-top: 40px;
  border: 1px solid black;
  box-shadow: 5px 5px 3px 3px gray;
}
.flex-container{
    height: 200px;
  width: 100%;
  float: left;
  padding: 20px;
  display: flex;
  flex-direction: column;
  background-color: #f1f1f1;
}
/* Style the header */
header {
  background-color: #75a3a3;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: whitesmoke;
  text-shadow: 5px 5px 5px gray;
}



/* article {
  float: left;
  padding: 20px;
  width: 100%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed }*/
 
#partitioned {
  padding-left: 15px;
  letter-spacing: 42px;
  border: 0;
  background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
  background-position: bottom;
  background-size: 50px 1px;
  background-repeat: repeat-x;
  background-position-x: 35px;
  width: 184px;
}
.greating{
  margin-bottom: 10px;
  margin-left: 10%;
  padding-left: 20%;
}
.mail-signature{
  font-size: 12px;
    font-weight: 500;
    margin-top: 52px;
}
/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #75a3a3;
  padding: 10px;
  text-align: center;
  color: whitesmoke;
  
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body >

  <header>
    <h2 style="font-size: 20px;">International Journal Of Innovative Research</h2>
    <h3 style="font-size: 20px;">Forget Password OTP</h3>
  </header>
  
  <section class="flex-container">
   
    <div class="greating">
      <h1>Dear {{ $name }},</h1>
      <p>Here is your forget password OTP,</p>
      <input value="{{$otp}}" id="partitioned" type="text" maxlength="4" />
    </div>
    

      

  
  </section>
  
  <footer>
    <p style="color: red;">***Do not share your OTP with anybody***</p>
    <p>Patuakhali Science and Technology University</p>
  </footer>





</body>
</html>

