@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div id="input" class="col">
      <h5>Basic Detail</h5>
      <form name="jsoninput" id="jsoninput">
        <input type="text" class="form-control" id="template_id" placeholder="Enter Template ID">
        <select id="template_type" class="select">
          <option value="order">Order</option>
          <option value="download">Download</option>
        </select>
      </form>

      <h5>Fonts</h5>
      <div id="formFonts">
        <h6 class="font">Font 1</h6>
        <form name="fonts" id="fonts" class="fonts">
          <input type="text" class="form-control" id="name" placeholder="Enter Font Name" />
          <input type="text" class="form-control" id="file" placeholder="Enter File Name" />
        </form>
      </div>
      <button type="button" id="addFont" class="btn btn-primary">Add Font</button>
      <button type="button" id="removeFont" class="btn btn-primary">Remove Font</button>

      <h5>Colors</h5>
      <div id="formFonts">
        <h6 class="font">Font 1</h6>
        <form name="fonts" id="fonts" class="fonts">
          <input type="text" class="form-control" id="name" placeholder="Enter Font Name" />
          <input type="text" class="form-control" id="file" placeholder="Enter File Name" />
        </form>
      </div>
      <button type="button" id="addFont" class="btn btn-primary">Add Font</button>
      <button type="button" id="removeFont" class="btn btn-primary">Remove Font</button>
    </div>

    <div id="output" class="col">
      <pre id="json">

      </pre>
    </div>
  </div>
  <div class="row" style="margin-top: 20px;">
    <div class="col">
      <button type="button" id="submit" class="btn btn-primary">Preview</button>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    buildJson();

    $("#submit").click(function() {
      var results = {}
      $("#jsoninput").children().each(function(){
        createResultArray(results, this)
      });
      var json = JSON.stringify(results, null, 2)
      $('#json').empty()
      $('#json').append(json)
    })

    $("#addFont").click(function() {
      fontCount = $.find(".fonts").length
      nextCount = fontCount + 1
      $("#formFonts").append(`` +
        `<h6 class="font${nextCount}">Font ${nextCount}</h6>` +
        `<form name="fonts${nextCount}" id="fonts${nextCount}" class="fonts">` +
          `<input type="text" class="form-control" id="name" placeholder="Enter Font Name" />` +
          `<input type="text" class="form-control" id="file" placeholder="Enter File Name" />` +
        `</form>` +
      ``)
    })

    $("#removeFont").click(function() {
      fontCount = $.find(".fonts").length
      console.log(fontCount)
      console.log($.find(`.font${fontCount}`))
      console.log($.find(`.fonts${fontCount}`))
      $($.find(`.font${fontCount}`)).remove()
      $($.find(`#fonts${fontCount}`)).remove()
    })
  })

  function createResultArray(results, element) {
    insert = `{"${$(element).attr('id')}": "${$(element).val()}"}`
    insert_json = JSON.parse(insert)
    results = $.extend(results, insert_json)
  }

  function buildJson(results) {
    if($(results).length == 0) {
      initialJson();
      return
    }

    $('#output').empty()
    $('#output').append('<div class="row">{</div>')
    var i = 1;
    $.each(results, function(k, v) {
      if($.isArray(v)) {
        processArray(v, i)
      } else {
        processNonArray(v, i)
      }
    })
    $('#output').append('<div class="row">}</div>')
  }

  function initialJson() {
    var empty = JSON.stringify([], null, 2)
    $('#json').append(empty)
  }

  function processNonArray(v, i) {
    addSpaces(i)

    $.each(v, function(key, value) {
      if($.isNumeric(value)) {
        $('#output').append('' +
          '"' +key+ '": ' +value+ '<br/>'
        )
      } else {
        $('#output').append('' +
          '"' +key+ '": "' +value+ '"<br/>'
        )
      }
    })
  }

  function processArray(v, i) {
    addSpaces(i)
  }

  function addSpaces(i) {
    var space = "&nbsp;"

    for(j=0;j<i;j++) {
      $('#output').append(space)
    }
  }

</script>

@endsection