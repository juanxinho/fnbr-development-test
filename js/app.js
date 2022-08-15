$(function (){
    let country = 0;
    let state = 0;
    let states = [];
    let city = 0;
    let cities = [];
    //console.log('Hola desde jquery');
    $.ajax({
        //url: 'countries-states-cities.js',
        url: '../json/countries+states+cities.json',
        type: 'POST',
        data: {  },
        success: function(response){
            let countries = response;
            console.log(countries);
            let template='<option value="0">Seleccione una opción</option>';
            countries.forEach(element => {
                template += `<option value='${element.id}'>
                    ${element.name}
                </option>`
            });
            console.log(template);
            $('#country').html(template);
            //$('#task-result').show();
        }
    });

    $.ajax({
        //url: 'countries-states-cities.js',
        url: './ajax.php',
        type: 'POST',
        data: { caso: 'areas' },
        success: function(response){
            let areas = JSON.parse(response);
            console.log(areas);
            let template='<option value="0">Seleccione una opción</option>';
            areas.forEach(element => {
                template += `<option value='${element.id}'>
                    ${element.description}
                </option>`
            });
            console.log(template);
            $('#areas').html(template);
            //$('#task-result').show();
        }
    });
    

    $('#country').change(function(){
		$.ajax({
            //url: 'countries-states-cities.js',
            url: '../json/countries+states+cities.json',
            type: 'POST',
            data: {  },
            success: function(response){
                let countries = response;
                console.log(countries);
                let template='<option value="0">Seleccione una opción</option>';
                countries.forEach(element => {
                    country = parseInt($( "#country" ).val());
                    state = element.id;
                    console.log(country+' '+state)
                    if(element.id == country){
                        states = element.states;
                    }
                });
                console.log(states);
                states.forEach(element => {
                    template += `<option value='${element.id}'>
                        ${element.name}
                    </option>`
                });
                console.log(template);
                $('#state').html(template);
                //$('#task-result').show();
            }
        })
	});

    $('#state').change(function(){
		$.ajax({
            //url: 'countries-states-cities.js',
            url: '../json/countries+states+cities.json',
            type: 'POST',
            data: {  },
            success: function(response){
                console.log(states);
                template='<option value="0">Seleccione una opción</option>';
                states.forEach(element => {
                    state = parseInt($( "#state" ).val());
                    console.log(state+' '+city)
                    if(element.id == state){
                        cities = element.cities;
                    }
                });
                cities.forEach(element => {
                    template += `<option value='${element.id}'>
                        ${element.name}
                    </option>`
                });
                $('#city').html(template);
                //$('#task-result').show();
            }
        })
	});

    $('#areas').change(function(){
		$.ajax({
            //url: 'countries-states-cities.js',
            url: './ajax.php',
            type: 'POST',
            data: { caso: 'programs', area_id: parseInt($( "#areas" ).val()) },
            success: function(response){
                let programs = JSON.parse(response);
                console.log(programs);
                template='<option value="0">Seleccione una opción</option>';
                programs.forEach(element => {
                    template += `<option value='${element.id}'>
                        ${element.description}
                    </option>`
                });
                $('#programs').html(template);
                //$('#task-result').show();
            }
        })
	});

});