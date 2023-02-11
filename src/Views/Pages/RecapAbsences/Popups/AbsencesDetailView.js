class AbsencesDetailView {
  constructor(absencesModel) {
    this.absencesModel = absencesModel;
    this.absencesModel.addEventListener("draw",  () => this.draw());

    this.apprenant = null;
    this.absencesContainer = document.getElementById("absencesContainer");

    document.getElementById("fermerAbsences").addEventListener("click", () => this.close());
  }

  async show(codeApprenant, name) {
    this.apprenant = codeApprenant;
    document.getElementById("absenceName").innerText = name;

    await this.draw();

    document.getElementById("backdrop").classList.toggle("hidden");
    const popup = document.getElementById("detailAbsences");
    popup.classList.toggle("hidden");
  }

  empty() {
    document.getElementById("absencesContainer").innerHTML = "";
  }

  async draw() {
    this.empty();
    const absences = await this.absencesModel.fetch(this.apprenant);
    absences.forEach((element) => {
      let absence = document.createElement("div");
      absence.className = "absence";

      let actionDiv = document.createElement("div");
      actionDiv.className = "actionAbsence";

      let text = document.createElement("p");
      text.className = "medium-semibold subtitle";
      text.innerText =
        "Absence le " + element.date_absence + " - " + element.nb_heures_absence + "h";

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

  bindEditAbsence(handler) {
    // modifier.onclick = () => {
    //   handler();
    // };
  }

  bindDeleteAbsence(handler) {
    absencesContainer.addEventListener("click", (event) => {
      if (event.target.dataset["action"] === "delete") {
        if (confirm("Voulez vous vraiment supprimer l'absence ?")) {
          handler(this.apprenant, event.target.dataset["absenceId"]);
        }
      }
    });
  }

  close() {
    document.getElementById("backdrop").classList.toggle("hidden");
    const popup = document.getElementById("detailAbsences");
    popup.classList.toggle("hidden");
    document.getElementById("absencesContainer").innerHTML = "";
  }
}
