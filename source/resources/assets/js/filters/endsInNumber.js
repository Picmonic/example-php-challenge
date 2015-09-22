picmonic.filter('endsInNumber', function() {
  return function(input) {
    return isFinite(parseInt(input[input.length-1]));
  };
});