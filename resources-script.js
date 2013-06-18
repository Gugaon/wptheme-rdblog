(function($){
	$(document).ready(function(){

		function assembleSelector(selectorGroups, groupIndex) {
			if (groupIndex == undefined) groupIndex = 0;
			
			var appendWith = [];
			if (selectorGroups[groupIndex + 1] != undefined) {
				appendWith = assembleSelector(selectorGroups, groupIndex + 1);
			} else {
				appendWith.push('');
			};
			
			var fullItems = [];
			if (selectorGroups[groupIndex] != undefined) {
				for (var i=0; i < selectorGroups[groupIndex].length; i++) {
					for (var j=0; j < appendWith.length; j++) {
					 	fullItems.push(selectorGroups[groupIndex][i] + appendWith[j]);
					};
				};
			};
			
			return fullItems;
		}

		function getFilterSelector(element){
			var $list = $(element).closest('#resources aside > ul').find('ul');
			var selectorGroups = [];
			
			for (var i = 0; i < $list.size(); i++){
				var $checkeds = $('#resources #' + $list.eq(i).attr('id') + ' > LI > input:checked');
				
				if ($checkeds.size()){
					var current = selectorGroups.length;
					selectorGroups[current] = [];
					$checkeds.each(function(j){
						selectorGroups[current].push('.'+this.value);
					});
				}
			}

			return assembleSelector(selectorGroups, 0).join(', ');
		}

		$('#resources aside input:checkbox').click(function(){
			var my_parent = $(this).attr('parent_category');
			if(my_parent) {
				$('#resources #'+my_parent).attr('checked', !$('#resources .parent_'+my_parent+':not(:checked)').size());
			} else {
				$('#resources .parent_'+$(this).attr('id')).attr('checked', ($(this).attr('checked'))?true:false );
			}
			
			var selector = getFilterSelector(this);

			if (!selector) {
				$('#resources .learning-material-list li').show();
			} else {
				$('#resources .learning-material-list li').each(function(){
					var $this = $(this);
					if ($this.is(':not('+selector+')')){
						$this.hide();
					} else {
						$this.show();
					}
				});
		
				if ( !$('#resources .learning-material-list li:visible').length ) {
				 	$('#resources .no-posts').removeClass('invisible');
				} else {
					$('#resources .no-posts').addClass('invisible');
				}
			}
		});
	});
})(jQuery);
