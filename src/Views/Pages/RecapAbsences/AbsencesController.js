/**
 * Classe controller entre les vues Popup, Table et les models Absences, RecapAbsences.
 */
class AbsencesController {
  constructor(models, views) {
    this.models = models;
    this.views = views;

    this.bindListeners();
  }

  /**
   * Met à jour une absence existante.
   *
   * @param {object} updatedAbsence Les informations mises à jour sur l'absence.
   */
  async updateAbsence(updatedAbsence) {
    let number, decrease;
    let absence = this.models["absences"].getAbsenceByCodeAbsence(
      updatedAbsence.code_absence,
      updatedAbsence.code_apprenant
    );
    if (updatedAbsence.nb_heures_absence < absence.nb_heures_absence) {
      decrease = true;
      number = absence.nb_heures_absence - updatedAbsence.nb_heures_absence;
    } else {
      decrease = false;
      number = updatedAbsence.nb_heures_absence - absence.nb_heures_absence;
    }
    await this.models["absences"].updateAbsence(updatedAbsence);
    await this.models["recapAbsences"].updateTotalHoursAbsences(updatedAbsence, decrease, number);
  }

  /**
   * Crée une nouvelle absence.
   *
   * @param {object} newAbsence Les informations sur la nouvelle absence.
   */
  async createAbsence(newAbsence) {
    await this.models["absences"].createAbsence(newAbsence);
    await this.models["recapAbsences"].updateTotalHoursAbsences(
      newAbsence,
      false,
      newAbsence.nb_heures_absence
    );
  }

  /**
   * Supprime une absence.
   *
   * @param {number} codeAbsence Le code de l'apprenant associé à l'absence à supprimer.
   * @param {number} codeApprenant Le code de l'absence à supprimer.
   */
  async deleteAbsence(codeApprenant, codeAbsence) {
    let absence = this.models["absences"].getAbsenceByCodeAbsence(codeAbsence, codeApprenant);
    await this.models["absences"].deleteAbsence(codeAbsence, codeApprenant);
    this.updateRecapTotalHours(codeApprenant, absence.nb_heures_absence);
  }

  /**
   * Met à jour les totaux d'heures d'absence pour un apprenant donné.
   *
   * @param {number} codeApprenant Le code de l'apprenant à mettre à jour.
   * @param {number} nbHeureAbsence Le nombre d'heures d'absence à ajouter ou soustraire.
   */
  updateRecapTotalHours(codeApprenant, nbHeureAbsence) {
    this.models["recapAbsences"].decreaseTotalHoursAbsences(codeApprenant, nbHeureAbsence);
  }

  /**
   * Ouvre une fenêtre pour modifier une absence existante.
   *
   * @param {number} codeApprenant Le code de l'apprenant associé à l'absence à modifier.
   * @param {number} codeAbsence Le code de l'absence à modifier.
   */
  openEditPopup(codeApprenant, codeAbsence) {
    this.views["absencesDetail"].hide(true);
    let name = this.models["recapAbsences"].getApprenantCompleteName(codeApprenant);
    this.views["absenceEdit"].show(codeApprenant, name, codeAbsence);
  }

  /**
   * Ouvre une fenêtre pour ajouter une absence.
   *
   * @param {number} codeApprenant Le code de l'apprenant associé à l'absence à créer.
   */
  openAjoutPopup(codeApprenant) {
    let name = this.models["recapAbsences"].getApprenantCompleteName(codeApprenant);
    this.views["absenceEdit"].show(codeApprenant, name);
  }

  /**
   * Ferme la popup d'édition d'une absences et cache la popup de détails si editMode est vrai.
   *
   * @param {boolean} editMode Indique si le mode d'édition est activé.
   */
  closeEditPopup(editMode) {
    this.views["absenceEdit"].close();
    if (editMode) this.views["absencesDetail"].hide(false);
  }

  /**
   * Ouvre une fenêtre pour visualiser le détail des absences.
   *
   * @param {number } codeApprenant Le code de l'apprenant associé aux absences à visualiser.
   */
  openDetailPopup(codeApprenant) {
    let name = this.models["recapAbsences"].getApprenantCompleteName(codeApprenant);
    this.views["absencesDetail"].show(codeApprenant, name);
  }

  /**
   * Attache les méthodes du controller en tant que handler des évènements des éléments.
   */
  bindListeners() {
    this.views["absencesDetail"].bindDeleteAbsence((...args) => this.deleteAbsence(...args));
    this.views["absencesDetail"].bindEditAbsence((...args) => this.openEditPopup(...args));

    this.views["absenceEdit"].bindDeleteAbsence((codeApprenant, codeAbsence, editMode) => {
      this.deleteAbsence(codeApprenant, codeAbsence);
      this.closeEditPopup(editMode);
    });

    this.views["absenceEdit"].bindCloseEdit((...args) => this.closeEditPopup(...args));
    this.views["absenceEdit"].bindConfirmEditAbsence((absence, editMode) => {
      if (editMode) {
        this.updateAbsence(absence);
      } else {
        this.createAbsence(absence);
      }
      this.closeEditPopup(editMode);
    });

    this.views["tableView"].bindOpenDetail((...args) => this.openDetailPopup(...args));
    this.views["tableView"].bindOpenAjout((...args) => this.openAjoutPopup(...args));
  }
}

window.addEventListener("DOMContentLoaded", async () => {
  let recapAbsences = new RecapAbsencesModel();
  let absences = new AbsencesModel();
  let tableview = new TableView(recapAbsences);
  let absencesDetail = new AbsencesDetailView(absences);
  let absenceEdit = new AbsenceEditView(absences);
  const controller = new AbsencesController(
    { recapAbsences: recapAbsences, absences: absences },
    { tableView: tableview, absencesDetail: absencesDetail, absenceEdit: absenceEdit }
  );
});
