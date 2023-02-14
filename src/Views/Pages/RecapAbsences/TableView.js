/**
 * Classe pour afficher un tableau des récapitulatifs d'absences.
 */
class TableView {
  constructor(recapAbsencesModel) {
    this.recapAbsencesModel = recapAbsencesModel;
    this.recapAbsencesModel.addEventListener("draw", () => this.draw());

    this.tbody = document.getElementsByTagName("tbody")[0];
  }

  /**
   * Affiche le tableau des récapitulatifs d'absences.
   */
  draw() {
    this.empty();

    const absences = this.recapAbsencesModel.getAbsences();
    for(const codeApprenant in absences) {
      this.createElement(absences[codeApprenant]);
    };
  }

  /**
   * Crée un élément HTML pour une ligne de tableau de récapitulatif d'absence.
   *
   * @param {object} element Les informations sur l'absence.
   */
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

    pAbsence.innerText = element.nb_total_h_absences ? element.nb_total_h_absences + "h" : "-";
    if(!element.nb_total_h_absences) {
      tr.className = "highlight";
    }

    btDetail.className = "small-button outline secondary";
    btDetail.innerText = "Détail";
    btDetail.dataset["apprenantId"] = element.code_apprenant;
    btDetail.dataset["action"] = "openDetail";

    btAjout.className = "small-button default primary";
    btAjout.innerText = "Ajouter une absence";
    btAjout.dataset["apprenantId"] = element.code_apprenant;
    btAjout.dataset["action"] = "openAjout";

    tr.appendChild(apprenant);
    tr.appendChild(groupe);
    absences.appendChild(pAbsence);
    div.appendChild(btDetail);
    div.appendChild(btAjout);
    absences.appendChild(div);
    tr.appendChild(absences);
    this.tbody.appendChild(tr);
  }

  /**
   * Associe un gestionnaire d'événements pour ouvrir le détail d'absences pour un apprenant.
   *
   * @param {function} handler Gestionnaire d'événements pour ouvrir le détail d'absences.
   */
  bindOpenDetail(handler) {
    this.tbody.addEventListener("click", (event) => {
      if(event.target.dataset["action"] === "openDetail"){
        handler(event.target.dataset["apprenantId"]);
      }
    });
  }

  /**
   * Associe un gestionnaire d'événements pour ajouter une absence pour un apprenant.
   *
   * @param {function} handler Gestionnaire d'événements pour ajouter une absence
   */
  bindOpenAjout(handler) {
    this.tbody.addEventListener("click", (event) => {
      if(event.target.dataset["action"] === "openAjout"){
        handler(event.target.dataset["apprenantId"]);
      }
    });
  }

  /**
   * Vider le tableau du récapitulatif des absences.
   */
  empty() {
    this.tbody.innerHTML = "";
  }
}
