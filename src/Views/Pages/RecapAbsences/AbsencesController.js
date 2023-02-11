class AbsencesController {
  constructor(models, views) {
    this.models = models;
    this.views = views;

    this.bindListeners();
  }

  deleteAbsence(codeApprenant, codeAbsence) {
    let absence = this.models["absences"].getAbsenceByCodeAbsence(codeAbsence, codeApprenant);
    this.models["absences"].deleteAbsence(codeAbsence, codeApprenant);
    this.updateRecapTotalHours(codeApprenant, absence.nb_heures_absence);
  }

  updateRecapTotalHours(codeApprenant, nbHeureAbsence) {
    this.models["recapAbsences"].decreaseTotalHoursAbsences(codeApprenant, nbHeureAbsence);
  }

  openDetailPopup(codeApprenant) {
    let name = this.models["recapAbsences"].getApprenantCompleteName(codeApprenant);
    this.views["absencesDetail"].show(codeApprenant, name);
  }

  bindListeners() {
    this.views["absencesDetail"].bindDeleteAbsence((...args) => this.deleteAbsence(...args));
    this.views["absencesDetail"].bindEditAbsence();

    this.views["tableView"].bindOpenDetail((...args) => this.openDetailPopup(...args));
  }
}

window.addEventListener("DOMContentLoaded", async () => {
  let recapAbsences = new RecapAbsencesModel();
  let absences = new AbsencesModel();
  let tableview = new TableView(recapAbsences);
  let absencesDetail = new AbsencesDetailView(absences);
  const controller = new AbsencesController(
    { recapAbsences: recapAbsences, absences: absences },
    { tableView: tableview, absencesDetail: absencesDetail }
  );
});
