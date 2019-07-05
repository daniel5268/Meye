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