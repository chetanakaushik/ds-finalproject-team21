var appNotes = new Vue({

el: '#appNotes',
data: {
  notes : [

  ],

  notesForm :{ },
},

 methods: {

   handleNotesForm : function(e) {

     // const url = new URL(window.location.href);
     // const taskId = url.searchParams.get('clientId');
     // this.notesForm.clientId = taskId;
     const s = JSON.stringify(this.notesForm);
     console.log(s);

     // POST to remote server
    fetch('api/notes_all.php', {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      headers: {
          "Content-Type": "application/json; charset=utf-8"
      },
      body: s // body data type must match "Content-Type" header
    })
  .then(function (response) {return response.json();})
    .then(function (json){
      json = appNotes.notes.push(json);
      console.log(json);
    })
    .catch( function(err)  {
      console.error('NOTES POST ERROR:');
      console.error(err);
    });

    // Reset workForm
    this.notesForm = this.getEmptyForm();
   },

   getEmptyForm : function(){
     return {
       notes: null,
     };
   },

},


created : function() {
  // Do data fetch
   const url = new URL(window.location.href);
   const taskId = url.searchParams.get('clientId');
   console.log('CLient: '+ taskId);
   this.taskId = taskId;

   if (!taskId) {
     //TODO: Error? 404?
     //e.g., window.location = '404.html';
   }

   // TODO: Fetch task-specific data
   // fetch('api/task?id=4')
   fetch('api/notes.php?clientId='+taskId)
   .then( response => response.json() )
   .then( json => {appNotes.notes = json} )
   .catch( err => {
     console.log('NOTES FETCH ERROR:');
     console.log(err);
   });
  // fetch('api/notes_all.php')
  // .then(function (response) {return response.json();})
  // .then(function (json){
  //   appNotes.notes = json;
  //    console.log(json);})
  // .catch( function(err) {
  //   console.log('NOTES LIST ERROR:');
  //   console.log(err);
  // });
}

});
