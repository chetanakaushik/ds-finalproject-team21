var app3 = new Vue({

el: '#app3',
data: {
  site : [

  ],
  siteForm: { },
},

 methods: {

   handleSiteForm : function(e) {

     const s = JSON.stringify(this.siteForm);
     console.log(s);

     // POST to remote server
    fetch('api/site.php', {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      headers: {
          "Content-Type": "application/json; charset=utf-8"
      },
      body: s // body data type must match "Content-Type" header
    })
  .then(function (response) {return response.json();})
    .then(function (json){
      json = app3.site.push(json);
      console.log(json);
    })
    .catch( function(err)  {
      console.error('SITE POST ERROR:');
      console.error(err);
    });

    // Reset workForm
    this.siteForm = this.getEmptyForm();
   },

   getEmptyForm : function(){
     return {
       site: null,
     };
   },

 },


created : function() {
  fetch('api/site.php')
  .then(function (response) {return response.json();})
  .then(function (json){
    app3.site = json;
     console.log(json);})
  .catch( function(err) {
    console.log('SITE LIST ERROR:');
    console.log(err);
  });
}

});
