document.addEventListener('DOMContentLoaded', async () => 
{
    const LocalUrl = "http://form_user/";

    //Method to load the selection of programs
    const loadSelectPrograms = async (e) => {
        const datos = new FormData();
        datos.append("idArea", e.target.value);
        
        await fetch(LocalUrl+"main/loadPrograms",
        {
            method : "POST",
            body : datos
        })
        .then(res => res.json())
        .then(res => 
        {
            let option = "";
            const selectPrograms = document.getElementById('programs');

            if (res.length && res != undefined) {
                selectPrograms.removeAttribute("disabled");
                res.forEach(element => {
                    option = document.createElement('option');
                    option.setAttribute("value", element.id_program);
                    option.textContent = element.name_program;
                    selectPrograms.append(option);
                });
            }
        });
    }

    const loadSelectState = async (e) => {
        const datos = new FormData();
        datos.append("idCountry", e.target.value);

        await fetch(LocalUrl+"main/loadStates",
        {
            method : "POST",
            body : datos
        })
        .then(res => res.json())
        .then(res => 
        {
            let option = "";
            const selectState = document.getElementById('state');

            if (res.length && res != undefined) {
                selectState.removeAttribute("disabled");
                res.forEach(element => {
                    option = document.createElement('option');
                    option.setAttribute("value", element.id_state);
                    option.textContent = element.name_state;
                    selectState.append(option);
                });
            }
        });
    }

    const loadSelectCities = async (e) => {
        const datos = new FormData();
        datos.append("idCities", e.target.value);
        await fetch(LocalUrl+"main/loadCities",
        {
            method : "POST",
            body : datos
        })
        .then(res => res.json())
        .then(res => 
        {
            let option = "";
            const selectCities = document.getElementById('city');

            if (res.length && res != undefined) {
                selectCities.removeAttribute("disabled");
                res.forEach(element => {
                    option = document.createElement('option');
                    option.setAttribute("value", element.id_city);
                    option.textContent = element.name_city;
                    selectCities.append(option);
                });
            }
        });
    }

    document.getElementById('area').addEventListener('change', loadSelectPrograms);
    document.getElementById('country').addEventListener('change', loadSelectState);
    document.getElementById('state').addEventListener('change', loadSelectCities);

});