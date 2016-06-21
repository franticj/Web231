// JavaScript Document
 $(document).ready(function(){
   $("#contact_form").validate({
      rules: {
         first_name: {
            required: true,
               },
			   last_name: {
            required: true,
               },
			    telephone: {
            required: true,
               },
			    message: {
            required: true,
               },
			  email: {
            required: true,
			email:true
               },
			  comments:{
              required:true,
              minlength:8
              }
         },
         messages: {
            first_name: "First Name Required",
			last_name: "First Name Required",
			email: "Valid Email Required",
			telephone: "Telephone number required",
			comments: "Comment Required"			
         },
     });
});