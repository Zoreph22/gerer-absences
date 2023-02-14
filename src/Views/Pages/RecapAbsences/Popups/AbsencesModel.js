/**
 * Classe qui stocke la liste des absences de tous les apprenants.
 */
class AbsencesModel extends Subject {
  constructor() {
    super();
    this.absences = {};
  }

  /**
   * Retourne les absences d'un apprenant.
   *
   * @param {number} codeApprenant Code de l'apprenant.
   * @returns {object[]}
   */
  getAbsencesByCodeApprenant(codeApprenant) {
    return this.absences[codeApprenant];
  }

  /**
   * Retourne l'absence d'un apprenant.
   *
   * @param {number} codeAbsence Code de l'absence.
   * @param {number} codeApprenant Code de l'apprenant.
   * @returns {object}
   */
  getAbsenceByCodeAbsence(codeAbsence, codeApprenant) {
    let absences = this.getAbsencesByCodeApprenant(codeApprenant);
    for (const element of absences) {
      if (element.code_absence == codeAbsence) {
        return element;
      }
    }
  }

  /**
   * Vérifie si les absences de l'apprenant on déjà été fetch.
   *
   * @param {number} codeApprenant
   * @returns {boolean}
   */
  isApprenantFetched(codeApprenant) {
    if (this.absences[codeApprenant]) {
      return true;
    }
    return false;
  }

  /**
   * Permet de trier les absences d'un apprenant par date décroissante.
   *
   * @param {object[]} array Tableau d'absences.
   */
  sort(array) {
    array.sort((item1, item2) => {
      if (new Date(item1.date_absence) > new Date(item2.date_absence)) {
        return -1;
      }
      if (new Date(item1.date_absence) < new Date(item2.date_absence)) {
        return 1;
      }
      return 0;
    });
  }

  /**
   * Permet de fetch les absences d'un apprenant depuis la base de données.
   *
   * @param {number} codeApprenant Code de l'apprenant.
   * @returns {Promise<object[]>} Tableau d'absences de l'apprenant.
   */
  async fetch(codeApprenant) {
    if (this.isApprenantFetched(codeApprenant)) {
      return this.getAbsencesByCodeApprenant(codeApprenant);
    }
    let payload = await fetch("http://localhost/api/allAbsencesOfApprenant?id=" + codeApprenant, {
      method: "GET",
    });
    let absences = await payload.json();
    this.absences[codeApprenant] = absences;
    this.sort(this.absences[codeApprenant]);
    return absences;
  }

  /**
   * Permet d'envoyer une requête à la base de données pour supprimer l'absence d'une apprenant.
   *
   * @param {number} codeAbsence Code de l'absence.
   * @param {number} codeApprenant Code de l'apprenant.
   */
  async deleteAbsence(codeAbsence, codeApprenant) {
    await fetch("http://localhost/api/deleteAbsence?id=" + codeAbsence, { method: "DELETE" });
    this.absences[codeApprenant] = this.absences[codeApprenant].filter(
      (element) => element.code_absence != codeAbsence
    );
    this.notify();
  }

  /**
   * Permet d'envoyer une requête à la base de données pour update les données d'une absence.
   *
   * @param {object} updatedAbsence Instance d'absence.
   */
  async updateAbsence(updatedAbsence) {
    await fetch("http://localhost/api/updateAbsence?id=" + updatedAbsence.code_absence, {
      method: "PUT",
      body: JSON.stringify(updatedAbsence),
    });
    let absence = this.absences[updatedAbsence.code_apprenant].find(
      (element) => element.code_absence === updatedAbsence.code_absence
    );
    absence.date_absence = updatedAbsence.date_absence;
    absence.nb_heures_absence = updatedAbsence.nb_heures_absence;
    this.sort(this.absences[updatedAbsence.code_apprenant]);
    this.notify();
  }

  /**
   * Permet d'envoyer une requête à la base de données pour créer une absence.
   *
   * @param {object} newAbsence Instance d'absence.
   */
  async createAbsence(newAbsence) {
    let payload = await fetch("http://localhost/api/createAbsence", {
      method: "POST",
      body: JSON.stringify(newAbsence),
    });
    let absence = await payload.json();
    if (!this.absences[absence.code_apprenant]) {
      this.absences[absence.code_apprenant] = [];
    }
    this.absences[absence.code_apprenant].push(absence);
    this.sort(this.absences[absence.code_apprenant]);
    this.notify();
  }
}
