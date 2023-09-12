async function fetchApiCall(url, headers = [], options = []) {
    try {
        let res = await fetch(url, {
            method : "GET",
            headers : headers
        });
        return await res.json();
    } catch (error) {
        console.log(error);
    }
};
