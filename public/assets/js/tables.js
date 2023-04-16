"use strict"

$(document).ready(function () {
  $('.boot-table').bootstrapTable({
    cache: false,
    striped: true,
    search: true,
    pagination: true,
    pageList: [10, 20, 50, 100, 200],
    pageSize: 20,
  });
});