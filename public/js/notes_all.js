var app19 = new Vue({
el: '#app19',
  data: {
    notes : [

    ]
  },

   methods: {

   },


  created : function() {
    fetch('api/notes_all.php')
    .then(function (response) {return response.json();})
    .then(function (json){
      app19.notes = json;
       console.log(json);})
    .catch( function(err) {
      console.log('NOTE LIST ERROR:');
      console.log(err);
    });
  }

});
