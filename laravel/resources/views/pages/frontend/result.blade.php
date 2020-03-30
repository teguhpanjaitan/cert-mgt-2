<style>
    .hidden {
        display: none;
    }

    /*.certificate-result .table tr td:first-child{
		padding-right: 5px;
		font-size: 80%;
		text-align: right;
	}*/

    .certificate-result .table tr td {
        text-transform: capitalize;
        font-size: 14px;
    }
</style>

<div class="certificate-result hidden">
    <table class="table">
        <tbody>
        </tbody>
    </table>
</div>

<div class="certificate-notfound hidden">
    <strong>Certificate not found.</strong>
</div>

<div class="servererror hidden">
    <strong>Server error occurred.<br /><br />Please try again.</strong>
</div>

<script>
    function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

	/*
	 * Callbacks
	 */
	AcademicCertificateCheckerControl.callback_RetrieveCertificateComplete = function(status,data){
		console.log('entered3');
		if(status){
			if(data.success){
				//console.log(data);
				jQuery(".certificate-result").removeClass('hidden');
				var appendToElm = jQuery('.certificate-result table tbody');

				//certificate number
				var newRow = jQuery('<tr><td>Certificate Number</td><td>' + htmlEncode(data.Number) + '</td></tr>').appendTo(appendToElm);						
				newRow = jQuery('<tr><td>Date Awarded</td><td>' + htmlEncode(data.Date12) + '</td></tr>').appendTo(appendToElm);
				newRow = jQuery('<tr><td>Recipient&#x27;s Full Name</td><td>' + htmlEncode(data.Name) + '</td></tr>').appendTo(appendToElm);
				newRow = jQuery('<tr><td>Type of Award</td><td>' + htmlEncode(data.type) + '</td></tr>').appendTo(appendToElm);
				newRow = jQuery('<tr><td>Awarded By</td><td>' + htmlEncode(data.Awarded) + '</td></tr>').appendTo(appendToElm);
				newRow = jQuery('<tr><td>Certified By </td><td>' + htmlEncode(data.Certified) + '</td></tr>').appendTo(appendToElm);
			} else{
				var errorMessages = new Array();
				jQuery.each(data.errors,function(index,value){
					errorMessages.push(value.msg);
                   // alert(value.msg);
				});
                //alert(data.number);
				var strErrMsg = "Unknown error";
				if(errorMessages.length > 0){
					strErrMsg = errorMessages.join("\n");
				}

				jQuery(".certificate-notfound").removeClass('hidden');
			}			
		} else{
			jQuery(".servererror").removeClass('hidden');
		}
		//console.log(data);
	};

	//retrieve certificate number from querystring
    var certificateNumber = getParameterByName('certificateno');
    if(empty(certificateNumber)){    	
    	jQuery(".certificate-notfound").removeClass('hidden');
    } else{
    	AcademicCertificateCheckerControl.RetrieveCertificate(certificateNumber);
    }
</script>