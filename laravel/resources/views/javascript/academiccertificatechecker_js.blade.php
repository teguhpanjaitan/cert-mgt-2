<?php if(false): ?>

	<script>

<?php endif; ?>



	var AcademicCertificateCheckerControl = function(){

		

		//Private

		

		//call backs

		var pcallback_RetrieveCertificateComplete = function(status,data){

			AcademicCertificateCheckerControl.callback_RetrieveCertificateComplete(status,data);

		};

		

		

		var formElement;

		return{

			//Public			 

					

			

			InitCertificateCheckForm: function(jqSelect) {

				jQuery.validator.addMethod(

				        "regex",

				        function(value, element, regexp) {

				            var re = new RegExp(regexp);

				            return this.optional(element) || re.test(value);

				        },

				        "Please check your input."

				);

				

				

				jQuery(jqSelect).validate({

					debug: true,

					rules: {

						certificatenumber: {

							required: true,
                            
                            regex: "^[0-9]{4}\\-?[0-9]{4}\\-?[0-9]{2}$"                            

						}

					},	

					messages: {

						certificatenumber: {												

							regex: "Invalid certificate number"

						}

					},

					submitHandler: function(form) {

						//ajax post						

						return false;

					}					

				});

				

				formElement = jQuery(jqSelect);

				

				jQuery('.btn-check-certificate',formElement).on('click',function(){

					

					if(formElement.valid()){

						//process retrieval

						var certificatenumber = jQuery('input[name="certificatenumber"]',formElement).val();

						

						certificatenumber = jQuery.trim( certificatenumber );

						

						//redirect to certification result page

						

						window.location = "/academic-verification/?certificateno=" + certificatenumber;

						

						

					}

					

				});

			},

			

			

			/*

			 * End form validation

			 */

			

			

			ShowForm: function(jQSelect){

				

			},

			RetrieveCertificate: function(certificatenumber){

				var postData = {

					ajaxaction: "checkcertificate",

					certificatenumber: certificatenumber

				};

				

				jQuery.post("<?php echo url('/') ?>/academic/ajax", postData, function(data) {

					pcallback_RetrieveCertificateComplete(true,data);

				}, 'json')

				.fail(

					function(e) { 
					   alert("fail");

						pcallback_RetrieveCertificateComplete(false,e); 

					}

				);

			},


			

			/*

			 * Public Callbacks

			 */



			callback_RetrieveCertificateComplete: function(status,data){

				

			}

		}

	}();





<?php if(false): ?>

	</script>

<?php endif; ?>