// QQ表情插件
(function($){  
	$.fn.qqFace = function(options){
		var defaults = {
			id : 'facebox',
			path : 'face/',
			assign : 'content'
		};
		var option = $.extend(defaults, options);
		var assign = $('#'+option.assign);
		var id = option.id;
		var path = option.path;
        emojione.imagePathPNG = path;
		if(assign.length<=0){
			alert('缺少表情赋值对象。');
			return false;
		}
		
		$(this).click(function(e){
			var strFace, labFace;
			if($('#'+id).length<=0){
				strFace = '<div id="'+id+'" style="position:absolute;display:none;z-index:1000;" class="qqFace">' +
							  '<table border="0" cellspacing="0" cellpadding="0"><tr>';
//                var shortnames = emojione.shortnames.split('|');
                var shortnames = [':grinning:',':grimacing:',':grin:',':joy:',':smiley:',':smile:',':sweat_smile:',':laughing:',':innocent:',':wink:',':blush:',':slight_smile:',':upside_down:',':relaxed:',':yum:',':relieved:',':heart_eyes:',':kissing_heart:',':kissing:',':kissing_smiling_eyes:',':kissing_closed_eyes:',':stuck_out_tongue_winking_eye:',':stuck_out_tongue_closed_eyes:',':stuck_out_tongue:',':money_mouth:',':nerd:',':sunglasses:',':hugging:',':smirk:',':no_mouth:',':neutral_face:',':expressionless:',':unamused:',':rolling_eyes:',':thinking:',':flushed:',':disappointed:',':worried:',':angry:',':rage:',':pensive:',':confused:',':slight_frown:',':frowning2:',':persevere:',':confounded:',':tired_face:',':weary:',':triumph:',':open_mouth:',':scream:',':fearful:',':cold_sweat:',':frowning:',':anguished:',':cry:',':disappointed_relieved:',':sleepy:',':sweat:',':sob:',':dizzy_face:',':astonished:',':zipper_mouth:',':mask:',':thermometer_face:',':head_bandage:',':sleeping:',':zzz:',':poop:',':smiling_imp:',':imp:',':japanese_ogre:',':japanese_goblin:',':skull:',':ghost:',':alien:',':robot:',':smiley_cat:',':smile_cat:',':joy_cat:',':heart_eyes_cat:',':smirk_cat:',':kissing_cat:',':scream_cat:',':crying_cat_face:',':pouting_cat:'];
				for(var i = 0; i < 75; i++){
					labFace = shortnames[i];
                    strFace += '<td><div onclick="$(\'#'+option.assign+'\').insertAtCaret(\'' + labFace + '\');">'+emojione.shortnameToImage(shortnames[i])+'</div></td>';
					if( (i+1) % 15 == 0 ) strFace += '</tr><tr>';
				}
				strFace += '</tr></table></div>';
			}
			$(this).parent().append(strFace);
			var offset = $(this).position();
			var top = offset.top + $(this).outerHeight();
			$('#'+id).css('top',top);
			$('#'+id).css('left',offset.left);
			$('#'+id).show();
			e.stopPropagation();
		});

		$(document).click(function(){
			$('#'+id).hide();
			$('#'+id).remove();
		});
	};

})(jQuery);

jQuery.extend({ 
unselectContents: function(){ 
	if(window.getSelection) 
		window.getSelection().removeAllRanges(); 
	else if(document.selection) 
		document.selection.empty(); 
	} 
}); 
jQuery.fn.extend({ 
	selectContents: function(){ 
		$(this).each(function(i){ 
			var node = this; 
			var selection, range, doc, win; 
			if ((doc = node.ownerDocument) && (win = doc.defaultView) && typeof win.getSelection != 'undefined' && typeof doc.createRange != 'undefined' && (selection = window.getSelection()) && typeof selection.removeAllRanges != 'undefined'){ 
				range = doc.createRange(); 
				range.selectNode(node); 
				if(i == 0){ 
					selection.removeAllRanges(); 
				} 
				selection.addRange(range); 
			} else if (document.body && typeof document.body.createTextRange != 'undefined' && (range = document.body.createTextRange())){ 
				range.moveToElementText(node); 
				range.select(); 
			} 
		}); 
	},

	insertAtCaret: function(textFeildValue){ 
		var textObj = $(this).get(0); 
		if(document.all && textObj.createTextRange && textObj.caretPos){ 
			var caretPos=textObj.caretPos; 
			caretPos.text = caretPos.text.charAt(caretPos.text.length-1) == '' ? 
			textFeildValue+'' : textFeildValue; 
		} else if(textObj.setSelectionRange){ 
			var rangeStart=textObj.selectionStart; 
			var rangeEnd=textObj.selectionEnd; 
			var tempStr1=textObj.value.substring(0,rangeStart); 
			var tempStr2=textObj.value.substring(rangeEnd); 
			textObj.value=tempStr1+textFeildValue+tempStr2; 
			textObj.focus(); 
			var len=textFeildValue.length; 
			textObj.setSelectionRange(rangeStart+len,rangeStart+len); 
			textObj.blur(); 
		}else{ 
			textObj.value+=textFeildValue; 
		} 
	} 
});
