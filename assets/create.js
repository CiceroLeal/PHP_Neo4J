$(function () {
   $('#agentes').select2({
       tags: true,
       insertTag: function (data, tag) {
           data.push(tag);
       }
   });
});