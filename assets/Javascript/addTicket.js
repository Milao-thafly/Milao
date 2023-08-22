// buttons and counter text
const btn_decrease = document.querySelector('.btn_decrease');
const btn_increase = document.querySelector('.btn_increase');
const ticketNumber = document.querySelector('#ticketNumber');


var count = 0;

// ticketNumber.setAttribute('innerText', count);
    
btn_decrease.addEventListener('click', (e) => {
    const styles = e.currentTarget.classList
    if(styles.contains('btn_decrease')) {
        count--;

        // console.log(ticketNumber);
    }
    count.textContent = count;
})


    btn_increase.addEventListener('click', (e) => {
        const styles = e.currentTarget.classList
        if(styles.contains('btn_increase')) {
            count++;
            // console.log(ticketNumber);
        }
        count.textContent = count;

    })



    //Je récupère dans une variable la valeur du compteur 
    // Je fais le count-- 
    // Je donne la nouvelle valeur comme la valeur affiché