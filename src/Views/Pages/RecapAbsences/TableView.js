class TableView {
  constructor(recapAbsencesModel) {
    this.recapAbsencesModel = recapAbsencesModel;
    this.recapAbsencesModel.addEventListener("draw", () => this.draw());

    this.tbody = document.getElementsByTagName("tbody")[0];
  }

  draw() {
    this.empty();

    const absences = this.recapAbsencesModel.getAbsences();
    for(const codeApprenant in absences) {
      this.createElement(absences[codeApprenant]);
    };
  }

  createElement(element){
    let tr = document.createElement("tr");

    let apprenant = document.createElement("td");
    let groupe = document.createElement("td");
    let absences = document.createElement("td");
    let pAbsence = document.createElement("p");

    let div = document.createElement("div");
    let btDetail = document.createElement("button");
    let btAjout = document.createElement("button");

    apprenant.innerText = element.nom_apprenant.toUpperCase() + " " + element.prenom_apprenant;

    groupe.innerText = element.nom_groupe;

    pAbsence.innerText = element.nb_total_absences ? element.nb_total_absences + "h" : "-";

    btDetail.className = "small-button outline secondary";
    btDetail.innerText = "Détail";
    btDetail.dataset["apprenantId"] = element.code_apprenant;
    btDetail.dataset["action"] = "openDetail";

    btAjout.className = "small-button default primary";
    btAjout.innerText = "Ajouter une absence";
    btAjout.dataset["apprenantId"] = element.code_apprenant;
    btAjout.dataset["action"] = "addAbsence";
    btAjout.onclick = () => {
      const codeApprenant = element.code_apprenant;
    };

    tr.appendChild(apprenant);
    tr.appendChild(groupe);
    absences.appendChild(pAbsence);
    div.appendChild(btDetail);
    div.appendChild(btAjout);
    absences.appendChild(div);
    tr.appendChild(absences);
    this.tbody.appendChild(tr);
  }

  bindOpenDetail(handler) {
    this.tbody.addEventListener("click", (event) => {
      if(event.target.dataset["action"] === "openDetail"){
        handler(event.target.dataset["apprenantId"]);
      }
    });
  }

  empty() {
    this.tbody.innerHTML = "";
  }
}
