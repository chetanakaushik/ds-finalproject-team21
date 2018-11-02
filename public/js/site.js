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

  // Do data fetch
   const url = new URL(window.location.href);
   const taskId = url.searchParams.get('clientId');
   console.log('Task: '+ taskId);
   this.taskId = taskId;

   if (!taskId) {
     //TODO: Error? 404?
     //e.g., window.location = '404.html';
   }

   // TODO: Fetch task-specific data
   // fetch('api/task?id=4')
   fetch('api/site.php?clientId='+taskId)
   .then( response => response.json() )
   .then( json => {app3.site = json} )
   .catch( err => {
     console.log('WORK FETCH ERROR:');
     console.log(err);
   })

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
