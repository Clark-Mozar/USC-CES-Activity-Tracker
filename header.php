<!DOCTYPE html>
<html>
<head>
<meta name="viewport", initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;} 
form {border: 3px solid #f1f1f1;}

img.avatar {
  width: 40%;
  border-radius: 50%;
}
.myLogo{
  width: 720px;
  height: 80px;
  position: absolute;
  left: 0px;
  top: 13px;
}
html, body {
  width: 100%;
  height:100%;
}

.MainHeader {
    /* background: linear-gradient(-45deg, #ee7752, #4ceb34, #34eb65, #3486eb); */
  /* background-color: rgb(17, 95, 89); */
   background-color: #ffffff;
    background-size: 400% 400%;
    height: 70px;
    animation: gradient 15s ease infinite;
    margin-top: 2px;
    padding-top:15px;

}
@media (max-width:600px) {
  .MainHeader {
  font-size: 12px;
  }}
  @media (max-width:400px) {
  .myLogo{
    width: 300px; 
    height: 50px;
    margin-top: 5px;
}}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
</style>
</head>
<body>
<img class="myLogo" src="USC_Logo.png" align="left"></img>
<h2 class="MainHeader"><font valign="center" color="black"></font></h2>



