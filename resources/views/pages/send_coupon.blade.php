<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial
}

* {
  box-sizing: border-box;
}

/* The browser window */
.container {
  border: 3px solid #f1f1f1;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

/* Container for columns and the top "toolbar" */
.row {
  padding: 10px;
  background: #f1f1f1;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
}

.left {
  width: 15%;
}

.right {
  width: 10%;
}

.middle {
  width: 75%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Three dots */
.dot {
  margin-top: 4px;
  height: 17px;
  width: 17px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

/* Style the input field */
input[type=text] {
  width: 100%;
  border-radius: 3px;
  border: none;
  font-size: 18px;
  background-color: white;
  margin-top: -8px;
  height: 35px;
  color: #666;
  padding: 5px;
}

/* Three bars (hamburger menu) */
.bar {
  width: 25px;
  height: 5px;
  background-color: #aaa;
  margin: 3px 0;
  display: block;
}

/* Page content */
.content {
  padding: 10px;
}

.column-row {
  float: left;
  width: 50%;
  padding: 10px;
  height: 310px; /* Should be removed. Only for demonstration */
}

.column-row img {
  width: 100%;
  height: 300px;
}
.coupon {
  width: 100%;
  border-radius: 15px;
  margin: 0 auto;
}

.promo {
  background: #ccc;
  padding: 7px;
  color: red;
}

.expire {
  color: red;
}

.coupon span {
  color:#fbaf32;
}

.coupon h2 {
  text-align: center;
  font-weight: 600;
  color: #fbaf32;
  font-size: 30px;
}
.coupon h3 {
  text-align: center;
  font-size: 20px;
}
</style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="column left">
      <span class="dot" style="background:#ED594A;"></span>
      <span class="dot" style="background:#FDD800;"></span>
      <span class="dot" style="background:#5AC05A;"></span>
    </div>
    <div class="column middle">
      <input type="text" value="http://www.adpethouse.com" style="width: 100%;border-radius: 3px;border: none;font-size: 15px;background-color: white;margin-top: -8px;height: 28px;color: #666;padding: 5px;">
    </div>
    <div class="column right">
      <div style="float:right">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="column-row">
        <img src="https://media-private.canva.com/LHvF8/MAFENuLHvF8/1/tl.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAJWF6QO3UH4PAAJ6Q%2F20220621%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20220621T012104Z&X-Amz-Expires=33973&X-Amz-Signature=3840c761a079f1caa7a970c63061bf690dd150eb3a4e1353761f0412e5406df3&X-Amz-SignedHeaders=host&response-expires=Tue%2C%2021%20Jun%202022%2010%3A47%3A17%20GMT" alt="Avatar" style="width:100%;">
    </div>
    <div class="column-row">
        
        <div class="coupon">
            <div class="container">
              <h2>PETHOUSE</h2>
              <h3><b> Tặng Voucher giảm đến <span>10%</span> cho tất cả sản phẩm</b></h3> 
              <p>Mã giảm giá chỉ được áp dụng cho 100 người may mắn sử dụng sớm nhất. Qúy khách đã từng mua hàng tại <span>PetHouse</span>
               nếu quan tâm xin mời vào tài khoản của mình để mua hàng và nhập mã phía dưới để được giảm giá khi mua hàng tại <span>PetHouse</span></p>
            </div>
            <div class="container">
              <p>Mã giảm giá: <span class="promo"><b>HAPPYBIRTHDAY</b></span></p>
              <p class="expire">Hạn sử dụng: 20/08/2022 đến 20/09/2022</p>
            </div>
          </div>
    </div>
  </div>
</div>

</body>
</html> 
