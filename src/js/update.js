 const edit = document.querySelectorAll(".edit");
    const editcontents = document.getElementById("tiny");
    const hiddeninput = document.getElementById("hidden");
    edit.forEach(element => {
      element.addEventListener("click", () => {
        const contents = element.parentElement.children[0].innerText;

        editcontents.value = contents;
        hiddeninput.value = element.id;


      });


    });


     



   

