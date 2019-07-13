/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var Chart = require('chart.js');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$('#register-button').click(function (){
	$('#register-form').submit();
});

const app = new Vue({
    el: '#app',
});

var chartData = {
    labels : ["Villanía","Heroismo"],
    datasets : [
        {
          backgroundColor: ["#F7464A", "#46BFBD"],            
          data : [7,3]
        }
    ],
    options: {
      responsive: true
    }
}



$('.pieChart').each( function () {	
	ctxP = $(this)[0].getContext('2d');
	var div = $(this).closest('div');

	var vill = parseInt(div.find("#vill").val());
	var hero = parseInt(div.find("#hero").val());
	var rest = 10 - (vill + hero);

	var conf = {
		type: 'pie',

		data: {
			labels: ["Sin definir","Villanía","Heroismo"],
			datasets: [{
				data: [rest,vill,hero],
				backgroundColor: [ "rgba(0, 0, 0, 0.2)","rgba(255, 99, 132, 0.4)", "rgba(75, 192, 192, 0.2)"],
				borderWidth: 1,
				borderColor: ["rgba(0, 0, 0,0.4)","rgb(255, 99, 132)", "rgb(75, 192, 192)"],
			}]
		},
		options: {
			title: {
	            display: true,
	            text: 'Villanía / Heroismo',
	            fontColor: "rgb(255,255,255)",
        	},
			legend: {
				display: false
	        },
			responsive: true
		}
	}
	var myPieChart = new Chart(ctxP, conf);	
});



$('.cari').each( function () {	
	ctxP = $(this)[0].getContext('2d');
	var div = $(this).closest('div');

	var cari = div.find("#cari").val();
	var conf = {
		
		"type": "horizontalBar",
		"title" : "Carisma",
	    "data": {
	      "labels": ["Carisma"],
	      "datasets": [{
	        "data": [cari],
	        "fill": false,
	        "backgroundColor": ["rgba(75, 192, 192, 0.2)",],
	        "borderColor": ["rgb(75, 192, 192)",],
	        "borderWidth": 1
	      }]
	    },
	    options: {
	    	title: {
	            display: true,
	            text: 'Carisma',
	            fontColor: "rgb(255,255,255)",
        	},
			legend: {
		        display: false,
				labels: {
		        	display: false
				}
		    },
			"scales": {
				"xAxes": [{
				  "ticks": {
				    "beginAtZero": true,
				    max: 10,
				    min: -10,
				    fontColor: "rgb(255,255,255)",
				  }
				}],
				"yAxes": [{
				  "ticks": {
				    display: false
				  }
				}]
			}
	    }
	}
	var myChart = new Chart(ctxP, conf);	
});

$('.apar').each( function () {	
	ctxP = $(this)[0].getContext('2d');
	var div = $(this).closest('div');

	var apar = div.find("#apar").val();
	var conf = {
		
		"type": "bar",
		"title" : "Apariencia",
	    "data": {
	      "labels": ["Apariencia"],
	      "datasets": [{
	        "data": [apar],
	        "fill": false,
	        "backgroundColor": ["rgba(75, 192, 75, 0.2)",],
	        "borderColor": ["rgb(75, 192, 75)",],
	        "borderWidth": 1
	      }]
	    },

	    options: {
	    	title: {
	            display: true,
	            text: 'Apariencia',
	            fontColor: "rgb(255,255,255)",
        	},
			legend: {
		        display: false,
				labels: {
		        	display: false
				}
		    },
			"scales": {
				"yAxes": [{
				  "ticks": {
				    "beginAtZero": true,
				    max: 20,
				    min: 0,
				    fontColor: "rgb(255,255,255)",
				  }
				}],
				"xAxes": [{
				  "ticks": {

				    display: false
				    
				  }
				}],
			}
	    }
	}
	var myChart = new Chart(ctxP, conf);	
});

var url = window.location.pathname;
var activePage = url.substring(url.lastIndexOf('/') + 1); 
$('.meye-nav-link').each(function(){
	var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1);
	if (activePage == linkPage) {
        $(this).closest("li").addClass("active"); 
    }
});
$('.btn-increment').click(function (){
	$input = $( this ).closest('.input-group').children('input');
	$prev = parseInt($input.val(), 10);
	$input.attr('value',$prev+1 ).change();
});

$('.btn-decrement').click(function (){
	$input = $( this ).closest('.input-group').children('input');
	$prev = parseInt($input.val(), 10);
	if ($prev>=1){
		$input.attr('value',$prev-1 ).change();
	}
});





$.fn.calcDiv = function (){
	console.log("entra");
	var fis = selected.hasClass('Fisico');
	var men = selected.hasClass('Mental');
	var coor = selected.hasClass('Coordinacion');
	var ener = selected.hasClass('Energia');
	var Hcor = selected.hasClass('H-Corporales');
	var Hener = selected.hasClass('H-Energia');
	var Hment = selected.hasClass('H-Mentales');
	var cost1 = 0;
	var cost2 = 0;
	var cost3 = 0;
	var data = selected.find('.fis');
	var d,u;
	var val;
	data.find('input').each(function(){
		val = parseInt($(this).val());
		d = Math.floor(val/10);
		u = val%10;
		if (fis){
			cost1 += ((5*d*d)+(5*d)+(u*d)+u);
		}else{
			d+=2;
			cost1 += ((5*d*d)+(5*d)+(u*d)+u)-30;
		}
	});
	data = selected.find('.men');
	data.find('input').each(function(){
		val = parseInt($(this).val());
		d = Math.floor(val/10);
		u = val%10;
		if (men){
			cost1 += ((5*d*d)+(5*d)+(u*d)+u);
		}else{
			d+=2;
			cost1 += ((5*d*d)+(5*d)+(u*d)+u)-30;
		}
	});
	
	data = selected.find('.coor');

	data.find('input').each(function(){

		val = parseInt($(this).val());
		d = Math.floor(val/10);
		u = val%10;
		if (coor){
			cost1 += ((5*d*d)+(5*d)+(u*d)+u);
		}else{
			d+=2;
			cost1 += ((5*d*d)+(5*d)+(u*d)+u)-30;
		}
	});
	data = selected.find('.life');
	
	data.find('input').each(function(){
		cost1 += parseInt($(this).val())*5;
	});

	//CALCULO TIPO 2
	data = selected.find('.Hcorp');
	val = 0;
	data.find('input').each(function(){
		val += parseInt($(this).val());
	});
	d = Math.floor(val/100);
	u = val%100;
	if (Hcor){
		cost2 += ((50*d*d)+(50*d)+(u*d)+u);

	}else{
		d+=1;
		cost2 += ((50*d*d)+(50*d)+(u*d)+u)-100;
	}
	data = selected.find('.Hment');
	val = 0;
	data.find('input').each(function(){
		val += parseInt($(this).val());
	});
	d = Math.floor(val/100);
	u = val%100;
	if (Hment){
		cost2 += ((50*d*d)+(50*d)+(u*d)+u);

	}else{
		d+=1;
		cost2 += ((50*d*d)+(50*d)+(u*d)+u)-100;
	}
	data = selected.find('.Hener');
	val = 0;
	data.find('input').each(function(){
		val += parseInt($(this).val());
	});
	d = Math.floor(val/100);
	u = val%100;
	if (Hener){
		cost2 += ((50*d*d)+(50*d)+(u*d)+u);

	}else{
		d+=1;
		cost2 += ((50*d*d)+(50*d)+(u*d)+u)-100;
	}
	data = selected.find('.ener');
	val=0;
	data.find('input').each(function(){
		val += parseInt($(this).val());
	});
	if(ener){
		cost2 += (val*5);
	}else{
		cost2 += (val*10);
	}
	
	
	selected.find('.t1-val').text(cost1);
	selected.find('.t2-val').text(cost2);
	console.log('sale');

};

var selected;

$('#pj-select').each(function(){
	var val = $(this).val();
	$('.pj-div').each(function(){
		if (( $(this).attr('id')) == val){
			$(this).removeClass('d-none');
			selected = $(this);
			selected.calcDiv();
		}else{
			$(this).addClass('d-none');
		}
	});
});

$('#pj-select').change(function(){
	var val = $(this).val();
	$('.pj-div').each(function(){
		if (( $(this).attr('id')) == val){
			$(this).removeClass('d-none');
			selected = $(this);
			selected.calcDiv();
		}else{
			$(this).addClass('d-none');
		}
	});
});

$('.data').change(function (){
	selected.calcDiv();
});