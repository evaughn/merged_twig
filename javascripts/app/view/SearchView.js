/**
 * @module Backbone
 * @submodule Backbone.View
 * @class SearchView
 * @constructor
 */

var SearchView = Backbone.View.extend({

	'events': {
		'change #plantMaintenance' : 'maintenanceImageChange',
		'change #plantType' : 'typeImageChange',
		'change #plantSize' : 'sizeImageChange',
	},

	'initialize': function(options) {
		var view = this;
		_.bindAll(view);

		view.mouse = false;

		App.trigger('header:check', {
			'callback': function () {
				view.pageURL = 'templates/searchplant.php';
				view.$el.addClass('loading').load(view.pageURL, function () {
					view.render();
				});
			}
		});
		
		log('Backbone : SearchView : Initialized');
		
	},

	'render': function() {
		var view = this;
		App.trigger('header:change', {
			'header': 'Database',
			'subtext': 'Search Plants',
			'callback': function(){
				$('#header_global .button.right').addClass('dashboard');
			}
		});

		var $advancedBtn = view.$el.find(".advancedButton");
		var $searchBtn = view.$el.find(".searchButton");
		$advancedBtn.on('click', view.expandOptions);
		$searchBtn.on('click', view.finishSearch);

		var $menuBtn = $("#header_global .button.left");
		console.log($menuBtn);
		$menuBtn.on('click', function(e){
			e.preventDefault();
			e.stopImmediatePropagation();
			if($('#advancedOptions').hasClass('advancedOptionsOpened')){
				$('#plantResults').removeClass('advancedOptionsOpened');
				$('#advancedOptions').removeClass('advancedOptionsOpened');
				$('.advancedButton').removeClass('active');
			}
		});
		
	},

	'expandOptions': function() {
		var view = this;
		if(!$('#plantResults').hasClass('advancedOptionsOpened')){
			$('#plantResults').addClass('advancedOptionsOpened');
			$('#advancedOptions').addClass('advancedOptionsOpened');
			$('.advancedButton').addClass('active');
		}else{
			$('#plantResults').removeClass('advancedOptionsOpened');
			$('#advancedOptions').removeClass('advancedOptionsOpened');
			$('.advancedButton').removeClass('active');
		}
	},

	'finishSearch': function() {
		var view = this;

		//close the advance search tab if open
		if($('.advancedButton').hasClass('active')){
			view.expandOptions();
		}
		//lets run some validation
		var $plantName = $('#plantName').val();
		var $plantSize = $('#plantSize').val();
		var $plantMain = $('#plantMaintenance').val();
		var $plantType = $('#plantType').val();

		var $urlString = "searchDatabase.php?"
		if($plantName == ''){
			$("#plantName").addClass('error');
		}else{

			if($("#plantName").addClass('error')){
				$("#plantName").removeClass('error');
			}

			$urlString += "plantName=" + $plantName;

			if($plantType != '-'){
				$urlString += "&plantType=" + $plantType;
			}

			if($plantSize != '-'){
				$urlString += "&plantSize=" + $plantSize;
			}

			if($plantMain != '-'){
				$urlString += "&plantMaintenance=" + $plantMain;
			}

			$.ajax({
				url: $urlString,
				dataType: 'json',
				type: 'GET',
				success: function(data){
					var numResults = data.num;
					if(numResults == 0){
						console.log('no results');
					}else{
						console.log('results');
						var $plants = data.plants;
						for(var i = 0; i< $plants.length;i++){
							console.log($plants[i].name);
						}
					}
				},

				error: function(error){
					console.log("error")
				}
			});
		}
	},

	'maintenanceImageChange': function(){

	},

	'sizeImageChange': function(){
		
	},

	'typeImageChange': function(){
		
	}

});