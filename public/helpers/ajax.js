export async function getData(url){
    try{
        let res = await fetch(url);
        let json = await res.json();
        return json;
    }catch(err){
        console.log(err);
    }
}