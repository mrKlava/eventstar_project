"use strict"

$(document).ready(function () {
  $('#table').bootstrapTable({
    cache: false,
    striped: true,
    search: true,
    pagination: true,
    pageList: [10, 25, 50, 100, 200],
    pageSize: 25,
  });
});