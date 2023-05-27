<html>

<body>
    <input id="teste" value="{{ $event['start_date_utc'] ?? null }}">
</body>
<script>
    let utcDate = document.getElementById('teste').value;
    //let utcDate = '2011-06-29T16:52:48.000Z';

    let localDate = new Date(utcDate);
    let day = localDate.getDate();
    let month = localDate.getMonth();
    let year = localDate.getFullYear();
    let hours = localDate.getHours();
    let minutes =  localDate.getMinutes();
    let seconds =  localDate.getSeconds();

    console.log(utcDate);
    console.log(utcDate,localDate);

    alert(day +'/' + month + '/' + year + ' ' + hours + ':' + minutes + ':' + seconds);

</script>

</html>