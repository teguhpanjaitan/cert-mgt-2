<?php if(false): ?>
	<script>
<?php endif; ?>

	var MembershipCheckerControl = function(){
		
		//Private
		
		//call backs
		var pcallback_RetrieveMembershipComplete = function(status,data){
			MembershipCheckerControl.callback_RetrieveMembershipComplete(status,data);
		};
		
		
		var formElement;
		return{
			//Public			 
					
			
			InitMembershipCheckForm: function(jqSelect) {
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
						membershipnumber: {
							required: true,
							regex: "^[0-9]{4}\\-?[0-9]{4}\\-?[0-9]{4}\\-?[0-9]{4}$"
						}
					},	
					messages: {
						membershipnumber: {												
							regex: "Invalid membership number"
						}
					},
					submitHandler: function(form) {
						//ajax post						
						return false;
					}					
				});
				
				formElement = jQuery(jqSelect);
				
				jQuery('.btn-check-membership',formElement).on('click',function(){
					
					if(formElement.valid()){
						//process retrieval
						var membershipnumber = jQuery('input[name="membershipnumber"]',formElement).val();
						
						membershipnumber = jQuery.trim( membershipnumber );
						
						//redirect to membership result page
						
						window.location = "/membership-verification/?membershipno=" + membershipnumber;
						
						
					}
					
				});
			},
			
			
			/*
			 * End form validation
			 */
			
			
			ShowForm: function(jQSelect){
				
			},
			RetrieveMembership: function(membershipnumber){
				var postData = {
					ajaxaction: "checkmembership",
					membershipnumber: membershipnumber
				};
				
				jQuery.post("<?php echo url('/') ?>/membership/ajax", postData, function(data) {
					pcallback_RetrieveMembershipComplete(true,data);
				}, 'json')
				.fail(
					function(e) { 
						pcallback_RetrieveMembershipComplete(false,e); 
					}
				);
			},
			
			/*
			 * Public Callbacks
			 */

			callback_RetrieveMembershipComplete: function(status,data){
				
			}
		}
	}();


<?php if(false): ?>
	</script>
<?php endif; ?>