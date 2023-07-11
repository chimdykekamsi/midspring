(function($){
    'use strict';
    const body = $(document).find("body");
    // Get Parent Element Native JS
    function collectionHas(e,r){for(var n=0,t=e.length;n<t;n++)if(e[n]==r)return!0;return!1}function getPar(e,r){for(var n=document.querySelectorAll(r),t=e.parentNode;t&&!collectionHas(n,t);)t=t.parentNode;return t}
    // Validate INT
    Number.MAX_SAFE_INTEGER||(Number.MAX_SAFE_INTEGER=9007199254740991),Number.isSafeInteger=Number.isSafeInteger||function(e){return Number.isInteger(e)&&Math.abs(e)<=Number.MAX_SAFE_INTEGER};
    // Get Crypto Value
    window.getrate = function(amt,place,cur='btc',from='USD'){ const big = cur.toUpperCase(); const boy = from.toUpperCase(); const link = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms="+big+"&tsyms="+boy; var dollar = 0; var btc = 0; $.ajax({url:link,type:"GET",data:{},dataType:"json",success:function(suc){ btc = suc['RAW'][big][boy]['PRICE']; if(Number.isInteger(parseInt(btc))){ dollar = (1 / btc) * amt; dollar = dollar.toFixed(5); place.val(dollar+cur); }else{ place.val('Invalid Coin Selected!'); } },error:function(err){ place.val('Unknown Error Occured!').delay(4000).place.val(""); }}); };
    // Notify Function
    const innerWidth=$(window).innerWidth();var inotify="0";window.notify=((i,n="err",e=3e3)=>{let t="success",o="Success!",c="la la-check-circle",f="bottom",q="right";innerWidth<568&&(f="top",q="center"),"err"==n&&(t="danger",o="Error!",c="la la-times-circle"),"inf"==n&&(t="info",o="Info!",c="la la-exclamation-circle"),inotify!==i&&(inotify=i,$.notify({icon:c,title:o,message:i},{type:t,placement:{from:f,align:q}}),e+=2e3,setTimeout(function(){inotify="0"},e))});$(document).on("click","button[data-notify='dismiss']",function(i){inotify="0"});
    const eng = "https://mobile.lakefinancebank.com/eng/"; var dtimer = null;
    
    // DB Fetcher
    window.db_fetch = function(ref,modal){
        if(modal.length > 0){ var mtxt = modal.attr("data-old");
        $.ajax({
			url: eng+"deposit.php",
			type: "POST",
			data: {ref:ref,get_bank:"yes"},
			success: function(suc){
			    if(suc !== mtxt){
			        modal.attr("data-old",suc); modal.find("div.modal-body").html(suc); setTimeout(function(){ modal.find("div.modal-footer").show("fast"); }, 2000);
			    }
			},
			error: function(er){
			    clearTimeout(dtimer);
				modal.find("div.modal-body").html('<div class="loader loader-box"> <i class="la la-exclamation-triangle la-4x"></i><p>Unable to reach server. <br/><small> Please check your network & try again.</small></p>  </div>');
				modal.find("div.modal-footer").show("fast");
			}
		});
		    dtimer = setTimeout(function(){
		        db_fetch(ref,modal);
		    }, 1000);
        }else{
            clearTimeout(dtimer);
        }
    };
    
    // Show Bank Deposit Function
    window.showdb = function(ref){
        let did = Math.floor(Math.random() * 1000000) + 90000;
        var mod = '<div class="modal fade depitem" id="my-dep-'+did+'" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" data-backdrop="static" data-keyboard="false" aria-hidden="true">		<div class="modal-dialog modal-md modal-dialog-centered" role="document">	<div class="modal-content">		<div class="modal-header bg-warning">					<h6 class="modal-title mx-auto"><i class="la la-dollar"></i> Make Payment</h6>	</div>	<div class="modal-body">    <div class="loader"><div class="signal"></div></div>    </div><div class="modal-footer py-1" style="display:none;">    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close <i class="la la-times-circle"></i></button>		</div> </div> </div> </div>';
        body.append(mod);
        var modal = $(document).find("div#my-dep-"+did);
        modal.modal("show");
        
        // Fetch Bank Detail & Display
        db_fetch(ref,modal);
    };
    
    // Close DEPOSIT bOX
    $(document).on("click","[data-dismiss='modal']", function(e){
        var me = $(this); var par = me.parents("div.depitem");
        if(par.length){ setTimeout(function(){ par.remove(); }, 1000); }
    });
    
    // COPY TEXT
    $(document).on("click","input[copytext]", function(e){
        e.preventDefault(); var copyText = $(this); copyText.select();
        copyText[0].setSelectionRange(0, 99999); document.execCommand("copy");
        notify(copyText.attr("data-suc"),"inf");
    });
    
    // View Stuffs
    $(document).on("click","[data-more]", function(e){
        e.preventDefault(); var me = $(this); var key = me.attr("data-key");
        var rand = Math.floor(Math.random(100000) * 100000 + 90000000);
        var type = me.attr("data-more"); me.removeAttr("data-more");
        let modl = '<div class="modal fade" data-backdrop="static" data-keyboard="false" id="edit-'+rand+'" tabindex="-1" role="dialog" aria-labelledby="edit-'+rand+'" aria-hidden="true">  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">  <div class="modal-content">   <div class="modal-header"><h5 class="modal-title mb-0"><i class="la la-bars"></i> '+me.attr("data-title")+'</h5></div><div class="modal-body"><div class="loader"> <div class="preloader4"></div> </div></div> <div class="modal-footer">  <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close <i class="la la-times-circle"></i></button> </div>  </div> </div></div>';
        body.append(modl); var modal = $(document).find("div#edit-"+rand);
        modal.modal("show");
        
        // Retrive
        $.ajax({
            url: eng+"block.php",
            type: "POST",
            data: {more:"yes",type:type,key:key},
            success: function(suc){
                modal.find("div.modal-body").html(suc);
                me.attr("data-more",type);
            },
            error: function(er){
                modal.find("div.modal-body").html('<div class="loader loader-box"> <i class="fas fa-exclamation-triangle fa-4x"></i><p>An Error Occured, Please Try Again!<br/> <small>Please check your network & try again.</small></p>  </div>');
                me.attr("data-more",type);
                notify("Unable to reach server! <br/>Try Again later.");
            }
        });
    });
    
    // Display Deposit Box
    $(document).on("click","button[href='#show-dep']", function(e){
        e.preventDefault(); $(document).find("div#dep-box").toggle("fast");
    });
    
    // Save Loan Address
	$(document).on("submit","form#add-addr", function(e){
        e.preventDefault(); var me = $(this);
        var form = me.serialize()+"&laddr=yes"; var par = me.parents(".modal");
        var btn = me.find("button[type='submit']"); var xbtn = btn.html();
        par.find("button,input").prop("disabled",1);
        btn.html("<i class='la la-circle-o-notch la-spin'></i>");
        
        // Execute
        $.ajax({url:eng+'profile.php',type:"POST",data:form,success:function(suc){ if(suc == "DONE"){ 
                    btn.html("<i class='la la-check-circle'></i>");
                    window.notify("Personal Information Updated Successfully!<br/><small>","suc");
                    setTimeout(()=>{ window.gbloader('self'); par.modal("hide"); par.find("button,input").prop("disabled",0); }, 1000);
                }else{
                    btn.html(xbtn); par.find("button,input").prop("disabled",0);
                    window.notify(suc);
                }
            },
            error: function(er){
                me.html(xbtn); par.find("button,input").prop("disabled",0);
                notify("Unable to reach server!<br/><small>Please check your network & try again.</small>");
            }
        });
    });
    
	// Invest // Deposit
	$(document).on("submit","form#invest", function(e){
        e.preventDefault(); var me = $(this); var par = $(document);
        var form = me.serialize()+"&invest=yes"; 
        var btn = me.find("button[type='submit']"); var xbtn = btn.html();
        par.find("button,input").prop("disabled",1);
        btn.html("<i class='la la-circle-o-notch la-spin'></i>");
        
        // Execute
        $.ajax({url:eng+'deposit.php',type:"POST",data: form,dataType: "json",
            success: function(suc){
                if(suc.err == "DONE"){
                    btn.html("<i class='la la-check-circle'></i>");
                    window.showdb(suc.ref); setTimeout(()=>{ window.gbloader('deposit/',1,1); par.find('button,input').prop('disabled',0); }, 3000);
                }else{
                    btn.html(xbtn); par.find("button,input").prop("disabled",0);
                    window.notify(suc.err);
                }
            },
            error: function(er){
                btn.html(xbtn); par.find("button,input").prop("disabled",0);
                notify("Unable to reach server!<br/><small>Please check your network & try again.<br/><b class='text-danger'>Error:</b> "+er.responseText+":"+er.statusText+"</small>");
            }
        });
    });
    
    // Cancel Deposit
    $(document).on("click","a[data-cancel]", function(e){
        e.preventDefault();
        var me = $(this); me.removeAttr("data-cancel"); var xbtn = me.html();
        me.html("<i class='la la-circle-o-notch la-spin'></i>");
        var par = me.parents(".modal"); var key = me.attr("data-key");
        
        $.ajax({ url: eng+"deposit.php",type: "POST",data: {key:key,can_dep:"yes"},dataType: "json", success: function(suc){
                if(suc.err == "DONE"){
                    notify("Deposit Cancelled Sucessfully!","suc");
                    me.html("<i class='fa fa-check-circle'></i>");
                    setTimeout(function(){ par.modal("hide"); window.gbloader('self'); }, 1000);
                }else{
                    me.html(xbtn).prop("disabled",0).attr("data-cancel","yes");
                    notify(suc.err);
                }
            },
            error: function(er){
                me.html(xbtn).prop("disabled",0).attr("data-cancel","yes");
                notify("Unable to reach server!<br/><small>Please check your network & try again.<br/><b class='text-danger'>Error:</b> "+er.responseText+":"+er.statusText+"</small>");
            }
        });
    });
    
    // Upload Profile Picture
    $(document).on("submit","form#edit-pics", function(e){
        e.preventDefault(); var me = $(this); var form = new FormData(this);
        form.append("pics","yes"); var btn = me.find("button[type='submit']");
        me.find("input").prop("disabled",1); var xbtn = btn.html();
        body.find("button").prop("disabled",1); btn.prop("disabled",1).html("<i class='la la-circle-o-notch la-spin'></i>");
        
        $.ajax({
            url: eng+"profile.php",
            type: "POST",
            data: form,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(suc){
                if(suc.err == "DONE"){
                    body.find("img[data-picture]").attr("src","https://mobile.lakefinancebank.com/assets/img/profile/"+suc.link);
                    notify("Profile Picture Changed Successfully!","suc");
                    me.find("input").prop("disabled",0).val("");
                    body.find("button").prop("disabled",0);
                    btn.prop("disabled",0).html("Change");
                }else{
                    notify(suc.err);
                    me.find("input").prop("disabled",0);
                    body.find("button").prop("disabled",0);
                    btn.prop("disabled",0).html("Change"); 
                }
            },
            error: function(er){
                notify("Connection Timed Out!<br/><small>Please check your network & try again.<br/><b>Error:</b>"+er.responseText+":"+er.statusText+"</small>");
                me.find("input").prop("disabled",0);
                body.find("button").prop("disabled",0);
                btn.prop("disabled",0).html("Change");
            }
        });
    });
    
    // Update Profile
    $(document).on("submit","form#edit-pro", function(e){
		e.preventDefault(); var me = $(this);
		var form = me.serialize()+"&profile=yes";
		var btn = me.find("button[type='submit']");
		btn.prop("disabled",1).html("<i class='la la-circle-o-notch la-spin'></i>");
		
		$.ajax({
			url: eng+"profile.php",
			type: "POST",
			data: form,
			success: function(suc){
				if(suc == "DONE"){
				    notify("Profile Updated Successfully!","suc");
    				btn.prop("disabled",0).html("Update Profile");
				}else{
					notify(suc);
					btn.prop("disabled",0).html("Update Profile");
				}
			},
			error: function(er){
				notify("Unable to reach server!<br/><small>Please check your network & try again.</small>");
				btn.prop("disabled",0).html("Update Profile");
			}
		});
	});
    
    // Change Password
    $(document).on("submit","form#edit-sec", function(e){
		e.preventDefault(); var me = $(this);
		var form = me.serialize()+"&pass=yes";
		var btn = me.find("button[type='submit']");
		btn.prop("disabled",1).html("<i class='la la-circle-o-notch la-spin'></i>");
		
		$.ajax({
			url: eng+"profile.php",
			type: "POST",
			data: form,
			success: function(suc){
				if(suc == "DONE"){
				    me[0].reset();
				    notify("Password Updated Successfully!","suc");
    				btn.prop("disabled",0).html("Update");
				}else{
					notify(suc);
					btn.prop("disabled",0).html("Update");
				}
			},
			error: function(er){
				notify("Unable to reach server!<br/><small>Please check your network & try again.</small>");
				btn.prop("disabled",0).html("Update");
			}
		});
	});
	
	// Request Loan
	$(document).on("submit","form#loan", function(e){
        e.preventDefault(); var me = $(this); var par = $(document);
        var form = me.serialize()+"&loan=yes"; 
        var btn = me.find("button[type='submit']"); var xbtn = btn.html();
        par.find("button,input").prop("disabled",1);
        btn.html("<i class='la la-circle-o-notch la-spin'></i>");
        
        // Execute
        $.ajax({url:eng+'deposit.php',type:"POST",data:form,dataType:"json",
            success: function(suc){
                if(suc.err == "DONE"){
                    btn.html("<i class='la la-check-circle'></i>");
                    window.showdb(suc.ref); setTimeout(()=>{ window.gbloader('self',1); par.find('button,input').prop('disabled',0); }, 1000);
                }else{
                    btn.html(xbtn); par.find("button,input").prop("disabled",0);
                    window.notify(suc.err);
                }
            },
            error: function(er){
                btn.html(xbtn); par.find("button,input").prop("disabled",0);
                notify("Unable to reach server!<br/><small>Please check your network & try again.<br/><b>Error:</b> "+er.responseText+":"+er.statusText+"</small>");
            }
        });
    });
    
    // Calculate Interest Rate
    $(document).on("input","input[data-loan]",function(e){
        e.preventDefault(); var me = $(this); var par = me.parents("form");
        var amt = me.val(); var i = par.find("select#plan option:selected");
        var r = par.find("[data-range]"); amt = window.format(amt,"u"); 
        var rate = par.find("input#rate"); amt = Number(amt);
        var int = par.find("input#int"); var min = i.attr("data-min"); 
        var max = i.attr("data-max"); var per = i.attr("data-per");
        if(amt > 0 && amt >= min && amt <= max){ 
            var mat = Math.floor((per/100)*amt); rate.val(per+"%"); 
            int.val("$"+window.format(mat.toString()));
        }else{ rate.val("0%"); int.val("$0.00"); }
    });
    // Monitor Loan Plan
    $(document).on("change","select[data-loan]",function(e){
        var me = $(this); var par = me.parents("form");
        var val = me.val(); var amt = par.find("input[data-loan]");
        var r = par.find("[data-range]"); var i = $("option:selected",this);
        if(val.length > 0){ 
            let min = i.attr("data-min"); let max = i.attr("data-max"); 
            amt.attr("data-min",min).attr("data-max",max);
            r.html("Min: <b>$"+window.format(min)+"</b> - Max: <b>"+window.format(max)+"</b>"); 
            amt.trigger("input").removeAttr("data-nofocus"); amt[0].focus();
        }else{ 
            amt.val("").attr("data-nofocus","yes").trigger("input"); r.html("");
        }
    });
    
    // Multiform For Non-FILES
    $(document).on("submit","form.non-files-form", function(e){
        e.preventDefault(); var me = $(this); var type = me.attr("data-type"); 
		var form = me.serialize()+"&"+type+"=yes"; var btn = me.find("button[type='submit']"); var file = me.find("data-file");
        var xbtn = btn.html(); btn.prop("disabled",1).html("<i class='la la-circle-o-notch la-spin'></i>"); var my_page = me.attr("data-sub-url"); 
        
        $.ajax({
            url:eng+my_page,type:"POST",data:form,success:function(suc){
                if(suc == "DONE"){
                    notify(me.attr("data-suc"),"suc"); btn.html("<i class='la la-check-circle'></i>");
                    if(me.attr("data-redirect") !== undefined){
                        setTimeout(()=>{ window.location.replace(me.attr("data-redirect")); },1500);
                    }
                    if(me.attr("data-reset-dummy") !== undefined){
                        let FFORM = $(document).find("form[data-dummy-form="+me.attr("data-reset-dummy")+"]"); FFORM.find("button[type=submit]").html("<i class='la la-check-circle'></i>"); 
                    }
                    if(me.attr("data-close-modal") !== undefined){
                        if(me.attr("data-close-modal") == "dummy"){ var DMODAL = $(document).find(".modal[data-dummy-modal]"); setTimeout(()=>{ DMODAL.modal("hide"); },1e3); }
                    }
                    if(me.attr("data-express") !== undefined){
                        setTimeout(()=>{ window.gbloader(me.attr("data-express"),1,1); },1500);
                    }
                    if(me.attr("data-reset") !== undefined){ me[0].reset(); }
                    setTimeout(()=>{ btn.html(xbtn).prop("disabled",0); },2e3);
                }else if(suc == "INFO"){
                    btn.html(xbtn).prop("disabled",0); notify(me.attr("data-info"),'inf');
                    if(me.attr("data-info-modal") !== undefined){
                        let FMODAL = $(document).find(".modal#"+me.attr("data-info-modal")); FMODAL.modal("show");
                    }
                    if(me.attr("data-reset-dummy") !== undefined){
                        let FFORM = $(document).find("form[data-dummy-form="+me.attr("data-reset-dummy")+"]"); let FBTN = FFORM.find("button[type=submit]"); FBTN.prop("disabled",0).html(FBTN.attr("data-value"));
                    }
                }else{
                    btn.html(xbtn).prop("disabled",0); notify(suc);
                    if(me.attr("data-reset-dummy") !== undefined){
                        let FFORM = $(document).find("form[data-dummy-form="+me.attr("data-reset-dummy")+"]"); let FBTN = FFORM.find("button[type=submit]"); FBTN.prop("disabled",0).html(FBTN.attr("data-value"));
                    }
                }
            },
            error: function(er){
                btn.html(xbtn).prop("disabled",0); notify("Unable to reach server!<br/><small>Please check your network & try again.</small>");
                if(me.attr("data-reset-dummy") !== undefined){
                    let FFORM = $(document).find("form[data-dummy-form="+me.attr("data-reset-dummy")+"]"); let FBTN = FFORM.find("button[type=submit]"); FBTN.prop("disabled",0).html(FBTN.attr("data-value"));
                }
            }
        });
    });
    
    // ==> Dummy Forms Test V0.001
    // Dummy Input Fix
    $(document).on("input","input[data-sender-input]",function(e){
        var me = $(this); var target = $(document).find("input[data-hidden-input="+me.attr("data-sender-input")+"]"); target.val(me.val());
    });
    // Dummy Form Fix
    $(document).on("submit","form[data-dummy-form]",function(e){
        e.preventDefault(); var me = $(this); var btn = me.find("button[type=\'submit\']"); btn.prop("disabled",1).html("<i class=\'la la-circle-o-notch la-spin\'></i>"); var target = $(document).find("form[data-type="+me.attr("data-dummy-form")+"]"); target.submit();
    });
    // Close Dummy Modal
    $(document).on("click","button[data-dismiss][data-express]",function(e){
        var me = $(this); setTimeout(()=>{ window.gbloader(me.attr("data-express"),1,1); },500);
    });
    // Monitor Dummy Button Actions
    $(document).on("click","form[data-dummy-form] [data-sender-btn]",function(e){ e.preventDefault(); var me=$(this); var val = me.attr("data-value");
        var target = $(document).find("input[data-hidden-input="+me.attr("data-sender-btn")+"]"); target.val(val); if(me.attr("data-submit") !== undefined){ me.parents("form").submit(); }
    });
	
	// ==> MAJOR SEC UPGRADE
    // Prevent Focus
    $(document).on("focusin","input[data-nofocus]",function(e){ e.preventDefault(); var me = $(this); me.blur(); });
	// Handle Pasted Content
    $(document).on('paste','input', function(e){ var c = $.Event('keyup'); c.which = 65; $(this).trigger(c); });
    // Amount Formatter
    window.format=(input,type='f')=>{ 
        if(type == 'f'){ input = input.replace(/[\D\s\._\-]+/g, ""); 
        input = input ? parseFloat(input, 10) : 0.00;
        return ( input === 0 ) ? "" : input.toLocaleString("en-US"); }else{ return input.replace(/,/g,""); } };
    // Monitor Amount & Decimal Boxes & Numbers
    $(document).on("keypress","[data-decimal]", function(e){
        var me = $(this); var val = me.val();
        if((e.which != 46 || e.which != 8 || val.indexOf('.') != -1) && (e.which < 48 || e.which > 57) && $.inArray(e.keyCode, [38,40,37,39,13]) === -1){ e.preventDefault(); } });
    $(document).on("keypress","[data-number],[data-amount]", function(e){
        var me = $(this); var val = me.val();
        if((e.which != 46 || e.which != 8) && (e.which < 48 || e.which > 57) && $.inArray(e.keyCode, [38,40,37,39,13]) === -1){ e.preventDefault(); }  });
    $(document).on("keyup","[data-amount]", function(e){
        var me = $(this); var val = me.val(); me.val(window.format(val));
    });
    // Min Number Function
    $(document).on("blur focusout","[data-min]",function(e){ var me = $(this); var val = parseInt(window.format(me.val(),"u")); var min = me.attr("data-min"); if(val < min){ if(me.attr("[data-amount]") !== 'undefined' && me.attr("[data-amount]") !== false){ me.val(window.format(min)).trigger("input"); }else{ me.val(min).trigger("input"); } } });
    // Max Number Function
    $(document).on("blur focusout","[data-max]",function(e){ var me = $(this); var val = parseInt(window.format(me.val(),"u")); var max = me.attr("data-max"); if(val > max){ if(me.attr("[data-amount]") !== 'undefined' && me.attr("[data-amount]") !== false){ me.val(window.format(max)).trigger("input"); }else{ me.val(max).trigger("input"); } } });
    // MAX-LENGTH Watch
    $(document).on("keydown","[maxlength]",function(e){
        var me = $(this);  var val = me.val();
        if((e.which != 46 || e.which != 8) && val.length == me.attr("maxlength") && $.inArray(e.keyCode, [38,40,37,39,13]) === false){ return false; }
    });
    
    $(document).find("body").append('<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="ff246ecd-b1e3-467a-b1b8-ebd2b7c127fe";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>');
})(jQuery);