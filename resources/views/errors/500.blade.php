<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>500 - Tạm chưa thể kết nối</title>
    <style type="text/css">
    html,body,div,span,applet,object,iframe,h1,h1,h2,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
ol,ul{list-style:none;margin:0px;padding:0px;}
blockquote,q{quotes:none;}
blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
table{border-collapse:collapse;border-spacing:0;}
/*-- start editing from here --*/
a{text-decoration:none;}
.txt-rt{text-align:right;}/* text align right */
.txt-lt{text-align:left;}/* text align left */
.txt-center{text-align:center;}/* text align center */
.float-rt{float:right;}/* float right */
.float-lt{float:left;}/* float left */
.clear{clear:both;}/* clear float */
.pos-relative{position:relative;}/* Position Relative */
.pos-absolute{position:absolute;}/* Position Absolute */
.vertical-base{	vertical-align:baseline;}/* vertical align baseline */
.vertical-top{	vertical-align:top;}/* vertical align top */
nav.vertical ul li{	display:block;}/* vertical menu */
nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
img{max-width:100%;}
/*-- end reset --*/
body {
    font-family: "Nunito", sans-serif;
    position: relative;
    padding: 0px 0 70px 0;
    text-align: center;
    background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('{{asset('public/frontend/img/image404.png')}}');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
} 
/*-- main --*/ 
.agileinfo-row {
    width: 65%;
    margin:0 auto;
}
/*-- top-nav --*/
.w3top-nav-right {
    margin-top: 4em;
}
.w3top-nav-left h1 {
    font-size: 3em; 
    font-weight: 100;
	line-height: .9em;
}
.w3top-nav-left h1 a {
    color: #fff;
}
.w3top-nav-right ul li {
    display: inline-block;
    margin:0 1.2em;
}
.w3top-nav-right ul li a{	
	color:#fff;
	font-size: 1em;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
	-ms-transition: 0.5s all;
	transition: 0.5s all;
}
.w3top-nav-right ul li a:hover{	
	color:#fbb034;
}
/*-- //top-nav --*/
/*-- //errortext --*/
.w3layouts-errortext{
    padding-top:4em;
    text-align: center;
} 
h1 {
    font-size: 2em;
    color: #fff;
    font-weight: 900; 
	line-height: 1.8em;
}  
p.w3lstext {
    font-size: 0.9em;
    color: #fff;
    line-height: 1.8em;
    font-weight: 400;
    width: 65%;
    text-transform: capitalize;
    margin: 1.5em auto 2.5em;
}
p.w3lstext a {
    color: #fbb034;
	padding-right:10px;
}
p.w3lstext a:hover{
    color: #ffffff;
}
.agile-search input[type="text"] {
    width: 50%;
    padding: 0.8em 1.5em;
    font-size: 1em;
    color: #fff;
    outline: none;
    border: 1px solid #fbb034;
    background: none;
    border-radius: 50px;
    -webkit-appearance: none;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    transition: 0.5s all;
}
.agile-search input[type="submit"] {
    outline: none;
    box-shadow: none;
    background: #fbb034;
    border: 1px solid #fbb034;
    padding: .8em 3em;
    color: #fff;
    cursor: pointer;
    border-radius: 50px;
    font-size: 1em;
    margin-left: 0.5em;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    transition: 0.5s all;
}
.agile-search input[type="submit"]:hover {
    color: #fbb034;
    background: transparent;
}
::-webkit-input-placeholder { 
	color:#fff !important;
}
:-moz-placeholder { /* Firefox 18- */
	color:#fff !important;
}
::-moz-placeholder {  /* Firefox 19+ */
	color:#fff !important;
}
:-ms-input-placeholder {  
	color:#fff !important;
}
/*-- errortext --*/
/*-- copyright --*/
.copyright {
    margin:3em 0 2em;
    text-align: center;
}
.copyright p {
    font-size: 1em;
    color: #fff;
	line-height:1.8em;
}
.copyright p a{
    color: #fff; 
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
	-ms-transition: 0.5s all;
	transition: 0.5s all;
}
.copyright p a:hover{
    color: #fbb034;	
}
/*-- //copyright --*/
/*-- //main --*/
.w3layouts-errortext h2{
    font-size: 14em;
    letter-spacing: 20px;
    color: #fff;
}
span {
    color: #fbb034;
}
/*-- responsive-design --*/ 
@media(max-width:1366px){
p.w3lstext { 
    width: 75%; 
}
} 
@media(max-width:1080px){
.agileinfo-row {
    width: 75%; 
}
} 
@media(max-width:991px){
p.w3lstext {
    width: 85%;
}
}
@media(max-width:900px){
.agileinfo-row {
    width: 85%;
}
.w3top-nav {
    padding-top: 2em;
}
.w3layouts-errortext {
    padding-top: 5em;
    text-align: center;
}
.w3top-nav-right ul li { 
    margin: 0 1em;
} 
p.w3lstext {
    width: 95%;
}
} 
@media(max-width:736px){
.w3layouts-errortext {
    padding-top: 3em;
}
}
@media(max-width:667px){
.w3top-nav-right ul li {
    margin: 0 0.5em;
}
h1 {
    font-size: 1em; 
}
p.w3lstext {
    width: 100%;
    font-size: 0.85em;
    line-height: 2em;
}
.copyright {
    margin: 2em 0 2em; 
}
.w3layouts-errortext {
    padding-top: 2em;
}
}
@media(max-width:480px){
.w3top-nav-left,.w3top-nav-right{
    float: none;
    text-align: center;
}
.w3top-nav-right {
    margin-top: 1.5em;
}
.w3top-nav-right ul li a { 
    font-size: 0.9em;
}
.w3top-nav-right ul li {
    margin: 0 1em;
}
.w3layouts-errortext img {
    width: 52%;
}
h1 {
    font-size: 0.9em;
}
.agile-search input[type="text"],.agile-search input[type="submit"]{ 
    font-size: 0.9em; 
}
.copyright p {
    font-size: 0.9em; 
    padding: 0 1em;
}
.w3layouts-errortext {
    padding-top: 6em; 
}
} 
@media(max-width:414px){
.w3layouts-errortext h2 {
    font-size: 9em;
}
.w3layouts-errortext {
    padding-top: 2em;
}
.agile-search input[type="text"] {
    width: 80%;
    margin-bottom: 1em;
}
}
@media(max-width:384px){
.agile-search input[type="text"] {
    width: 85%;
}
.agile-search input[type="submit"] {
    margin: 0em 0 0 0;
	padding: .7em 2em;
}
.w3top-nav {
    padding-top: 1em;
}
p.w3lstext { 
    font-size: 0.8em; 
}
.agileinfo-row {
    width: 87%;
}
.w3layouts-errortext {
    padding-top: 1em;
}
.w3layouts-errortext h2 {
    letter-spacing: 10px;
}
} 
@media(max-width:320px){
.w3top-nav-right ul li a {
    font-size: 0.85em;
}
.w3top-nav-right ul li {
    margin: 0 0.6em;
}
h1 {
    font-size: 0.85em;
} 
p.w3lstext { 
    margin: 0.8em auto;
}
.w3layouts-errortext {
    padding-top: 0em;
}
.w3top-nav-right {
    margin-top: 1em;
}
.agile-search input[type="submit"] { 
    padding: .6em 2em;
}
.copyright {
    margin: 1em 0 1em;
}
.copyright p {
    font-size: 0.8em; 
}
.w3layouts-errortext h2 {
    font-size: 7em;
}
}
/*-- //responsive-design --*/

    </style>
</head>
<body>
    <div class="agileits-main"> 
		<div class="agileinfo-row">
			<div class="w3layouts-errortext">
				<h2>5<span>0</span>0</h2>
				<h1>Chà chà!! Hình như trang quá tải mất tiu rồi</h1>
				<p class="w3lstext">Đây không phải là lỗi, đây chỉ là tai nạn nghề nghiệp không chủ đích. Tuy nhiên, chúng tôi không biết đây có phải đúng trang bạn đang tìm hay không và chúng tôi rất tiếc vì việc này.</p>
				<div class="agile-search"> 
					<a href="{{URL::to('/')}}"><input type="submit" value="Quay lại Trang chủ"></a>
				</div>
			</div>	
		</div>	
	</div>	
	<div class="copyright w3-agile">
		<p><i class="fa fa-heart" aria-hidden="true"></i> adpethouse.com <i class="fa fa-heart" aria-hidden="true"></i></p>
	</div>
</body>
</html>