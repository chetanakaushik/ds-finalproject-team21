var app1 = new Vue({
el: '#app1',
  data: {
    client : [

    ],
    clientForm: { },
  },

   methods: {
     handleClientForm : function(e) {

       const s = JSON.stringify(this.clientForm);
       console.log(s);

       // POST to remote server
      fetch('api/client.php', {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        headers: {
            "Content-Type": "application/json; charset=utf-8"
        },
        body: s // body data type must match "Content-Type" header
      })
    .then(function (response) {return response.json();})
      .then(function (json){
        json = app1.client.push(json);
        console.log(json);
      })
      .catch( function(err)  {
        console.error('CLIENT POST ERROR:');
        console.error(err);
      });

      // Reset workForm
      this.clientForm = this.getEmptyClientForm();
     },

     getEmptyClientForm : function(){
       return {
         client: null,
       };
     },
   },


  created : function() {
    fetch('api/client.php')
    .then(function (response) {return response.json();})
    .then(function (json){
      app1.client = json;
       console.log(json);})
    .catch( function(err) {
      console.log('CLIENT LIST ERROR:');
      console.log(err);
    });
  }

});
