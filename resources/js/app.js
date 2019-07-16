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


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



//Submits anidados

$('#register-button').click(function (){
	$('#register-form').submit();
});


//charts


//--- Villanía/Heroismo
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


// --- Carisma

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


// --- Apariencia

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


// Pagina activa

var url = window.location.pathname;
var activePage = url.substring(url.lastIndexOf('/') + 1); 
$('.meye-nav-link').each(function(){
	var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1);
	if (activePage == linkPage) {
        $(this).closest("li").addClass("active"); 
    }
});


// Botones incremento/decremento
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("#"+fieldName);
    var currentVal = parseInt(input.val());
    
    if (!isNaN(currentVal)) {
        if(type == 'minus'){
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});

$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('id');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('El valor mínimo ya se alcanzó');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('El valor máximo ya se alcanzó');        
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


//Selector de pj

var selected;

$.fn.changeSelected = function (){
	var val = $(this).val();
	$('.pj-div').each(function(){
		if (($(this).attr('id')) == val){
			$(this).removeClass('d-none');
			selected = $(this);
		}else{
			$(this).addClass('d-none');
		}
	});
};


$('#pj-select').changeSelected();
$('#pj-select').change(function(){
	$(this).changeSelected();
	$(this).calcDiv();
});

//Calculo de xp gastada

$.fn.calcDiv = function (){
	console.log('Entra calcDiv');
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
	var data = selected.find('.Físicos');
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
	data = selected.find('.Mentales');
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
	
	data = selected.find('.Coordinación');

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
	data = selected.find('.Vida');
	
	data.find('input').each(function(){
		cost1 += parseInt($(this).val())*5;
	});

	//CALCULO TIPO 2
	data = selected.find('.H-Corporales');
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
	data = selected.find('.H-Mentales');
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
	data = selected.find('.H-Energía');
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
	data = selected.find('.Energía');
	val=0;
	data.find('input').each(function(){
		val += parseInt($(this).val());
	});
	if(ener){
		cost2 += (val*5);
		data = selected.find('._Energía');

	}else{
		cost2 += (val*10);
	}
	
	
	selected.find('.t1-val').text(cost1);
	selected.find('.t2-val').text(cost2);
	console.log('Sale calcDiv');

};


selected.calcDiv();
$('.input-number').change(function (){
	selected.calcDiv();
});