$(document).ready(function() {

$( "#rolldown" ).mouseleave(function() {
  $( "#rolldown" ).animate( {height:'0px',},'fast' );
});

$( "nav ul li:nth-child(5)" ).mouseenter(function() {
  $( "#rolldown" ).animate( {height:'250px',},'fast' );
});

$( "nav ul li:nth-child(4)" ).mouseenter(function() {
  $( "#rolldown" ).animate( {height:'250px',},'fast' );
});

$( "nav ul li:nth-child(7)" ).mouseenter(function() {
  $( "#rolldown" ).animate( {height:'250px',},'fast' );
});

$("nav ul li:nth-child(1)").hover(function() {
  $( "#rolldown ul li" ).animate( {left:'0px',},'fast' );
});

$("nav ul li:nth-child(2)").hover(function() {
  $( "#rolldown ul li" ).animate( {left:'-1060px',},'fast' );
});

$("nav ul li:nth-child(3)").hover(function() {
  $( "#rolldown ul li" ).animate( {left:'-2120px',},'fast' );
});

$("nav ul li:nth-child(4)").hover(function() {
  $( "#rolldown ul li" ).animate( {left:'-3180px',},'fast' );
});

$("nav ul li:nth-child(5)").hover(function() {
  $( "#rolldown ul li" ).animate( {left:'-4240px',},'fast' );
});

$("nav ul li:nth-child(6)").hover(function() {
  $( "#rolldown ul li" ).animate( {left:'-5300px',},'fast' );
});

$("nav ul li:nth-child(7)").hover(function() {
  $( "#rolldown ul li" ).animate( {left:'-6360px',},'fast' );
});

$("#login").click(function() {
  $( "#rolldown" ).animate( {height:'250px',},'fast' );
  $( "#rolldown ul li" ).animate( {left:'-6360px',},'fast' );
});

$("#tool").click(
  function () {
	 
	  if("0px" == $( "#user_default ul li" ).css( "left" )){ var mennyi="-780px";}else{ var mennyi="0px";}
	   $("#user_default ul li").animate(
	{
		left: mennyi,
	}
	);});
	
$("#tool_1").click(
  function () {
	 
	  if("0px" == $( "#cv_edit ul li" ).css( "left" )){ var mennyi="-780px";}else{ var mennyi="0px";}
	   $("#cv_edit ul li").animate(
	{
		left: mennyi,
	}
	);});
	
$("#tool_2").click(
  function () {
	 
	  if("0px" == $( "#cv_edu ul li" ).css( "left" )){ var mennyi="-780px";var magas="370px";}else{ var mennyi="0px";}
	   $("#cv_edu ul li").animate(
	{
		left: mennyi,

	}
	);});
	

$("#tool_3").click(
  function () {
	 
	  if("0px" == $( "#cv_work ul li" ).css( "left" )){ var mennyi="-780px";}else{ var mennyi="0px";}
	   $("#cv_work ul li").animate(
	{
		left: mennyi,
	}
	);});
	
$("#tool_4").click(
  function () {
	 
	  if("0px" == $( "#cv_lang ul li" ).css( "left" )){ var mennyi="-780px"; }else{ var mennyi="0px";}
	   $("#cv_lang ul li").animate(
	{
		left: mennyi,
	}
	);});
	
$("#tool_5").click(
  function () {
	 
	  if("0px" == $( "#events ul li" ).css( "left" )){ var mennyi="-780px"; }else{ var mennyi="0px";}
	   $("#events ul li").animate(
	{
		left: mennyi,
	}
	);});	
	
$("#tool_6").click(
  function () {
	 
	  if("0px" == $( "#single_event ul li" ).css( "left" )){ var mennyi="-780px"; }else{ var mennyi="0px";}
	   $("#single_event ul li").animate(
	{
		left: mennyi,
	}
	);});	
	
$("#tool_8").click(
  function () {
	 
	  if("0px" == $( "#single_job ul li" ).css( "left" )){ var mennyi="-780px"; }else{ var mennyi="0px";}
	   $("#single_job ul li").animate(
	{
		left: mennyi,
	}
	);});	
	
$("#tool_7").click(
  function () {
	 
	  if("0px" == $( "#jobs ul li" ).css( "left" )){ var mennyi="-780px"; }else{ var mennyi="0px";}
	   $("#jobs ul li").animate(
	{
		left: mennyi,
	}
	);});				
				
	
$("#killorder").click(function() {
  $( "#user_default ul li" ).animate( {left:'-1580px',},'fast' );
  });
  
 
  
  
  });



