/**
 * Classe pour la vue de la popup des détails des absences.
 */
class AbsencesDetailView {
  constructor(absencesModel) {
    this.absencesModel = absencesModel;
    this.absencesModel.addEventListener("draw", () => this.draw());

    this.codeApprenant = null;
    this.absencesContainer = document.getElementById("absencesContainer");

    document.getElementById("fermerAbsences").addEventListener("click", () => this.close());
  }

  /**
   * Affiche la popup des détails des absences pour un apprenant donné.
   *
   * @param {number} codeApprenant Le code de l'apprenant.
   * @param {string} name Le nom de l'apprenant.
   * @returns {Promise}
   */
  async show(codeApprenant, name) {
    this.codeApprenant = codeApprenant;
    document.getElementById("absenceName").innerText = name;

    await this.draw();

    document.getElementById("backdrop").classList.toggle("hidden");
    const popup = document.getElementById("detailAbsences");
    popup.classList.toggle("detailHidden");
  }

  /**
   * Vide le conteneur des absences
   */
  empty() {
    document.getElementById("absencesContainer").innerHTML = "";
  }

  /**
   * Dessine les détails des absences pour un apprenant donné.
   *
   * @returns {Promise}
   */
  async draw() {
    this.empty();
    const absences = await this.absencesModel.fetch(this.codeApprenant);
    absences.forEach((element) => {
      let absence = document.createElement("div");
      absence.className = "absence";

      let actionDiv = document.createElement("div");
      actionDiv.className = "actionAbsence";

      let text = document.createElement("p");
      text.className = "medium-semibold subtitle";
      text.innerText =
        "Absence le " +
        new Intl.DateTimeFormat("fr-FR").format(new Date(element.date_absence)) +
        " - " +
        element.nb_heures_absence +
        "h";

      let modifier = document.createElement("button");
      modifier.className = "small-button outline secondary";
      modifier.innerText = "Modifier";
      modifier.dataset["action"] = "modifier";
      modifier.dataset["absenceId"] = element.code_absence;
      actionDiv.appendChild(modifier);

      let supprimer = document.createElement("button");
      supprimer.className = "small-button default delete";
      supprimer.innerText = "Supprimer";
      supprimer.dataset["action"] = "delete";
      supprimer.dataset["absenceId"] = element.code_absence;
      actionDiv.appendChild(supprimer);

      absence.appendChild(text);
      absence.appendChild(actionDiv);

      absencesContainer.appendChild(absence);
    });
  }

  /**
   * Lie un écouteur d'événement pour la modification d'une absence.
   *
   * @param {function} handler La fonction gérant la modification d'une absence.
   */
  bindEditAbsence(handler) {
    absencesContainer.addEventListener("click", (event) => {
      if (event.target.dataset["action"] === "modifier") {
        handler(this.codeApprenant, event.target.dataset["absenceId"]);
      }
    });
  }

  /**
   * Lie un écouteur d'événement pour la suppression d'une absence.
   *
   * @param {function} handler La fonction gérant la suppression d'une absence.
   */
  bindDeleteAbsence(handler) {
    absencesContainer.addEventListener("click", (event) => {
      if (event.target.dataset["action"] === "delete") {
        if (confirm("Voulez vous vraiment supprimer l'absence ?")) {
          handler(this.codeApprenant, event.target.dataset["absenceId"]);
        }
      }
    });
  }

  /**
   * Ferme la fenêtre de détails des absences
   */
  close() {
    document.getElementById("backdrop").classList.toggle("hidden");
    this.hide();
  }

  /**
   * Masque la fenêtre de détails des absences.
   *
   * @param {boolean} isHidden Indique si la fenêtre est cachée.
   */
  hide(isHidden) {
    const popup = document.getElementById("detailAbsences");
    popup.classList.toggle("detailHidden", isHidden);
  }
}
