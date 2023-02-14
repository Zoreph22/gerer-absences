/**
 * Classe qui stocke le récapitulatif des absences de tous les apprenants.
 */
class RecapAbsencesModel extends Subject{
  constructor() {
    super();
    this.recapAbsences = {};

    this.fetch();
  }

  /**
   * @returns {object}
   */
  getAbsences(){
    return this.recapAbsences;
  }

  /**
   * Permet d'obtenir le nom complet de l'apprenant.
   *
   * @param {number} codeApprenant Code de l'apprenant.
   * @returns {string} Nom complet de l'apprenant.
   */
  getApprenantCompleteName(codeApprenant){
    let apprenant = this.recapAbsences[codeApprenant];
    let name = apprenant.nom_apprenant.toUpperCase() + " " + apprenant.prenom_apprenant;
    return name;
  }

  /**
   * Permet d'envoyer une requête à la base de données pour recupérer le récapitulatif
   * des absences de tous les apprenants.
   *
   * @returns {Promise<object[]>} Tableau du récapitulatif des absences.
   */
  async fetch() {
    let payload = await fetch("http://localhost/api/recapAbsences", { method: "GET" });
    let recap = await payload.json();
    recap.forEach((element) => {
      this.recapAbsences[element.code_apprenant] = element;
    });
    this.notify();
    return recap;
  }

  /**
   * Permet de diminuer le nombre total d'heures d'absence d'un apprenant.
   *
   * @param {number} codeApprenant Code de l'apprenant.
   * @param {number} nbHeureAbsence nombre d'heure d'absence de l'absence modifier.
   */
  decreaseTotalHoursAbsences(codeApprenant, nbHeureAbsence) {
    let apprenant = this.recapAbsences[codeApprenant];
    apprenant.nb_total_h_absences = apprenant.nb_total_h_absences - nbHeureAbsence;
    this.notify();
  }

  /**
   * Permet de modifier le nombre total d'heures d'absence d'un apprenant.
   *
   * @param {object} updatedAbsence Instance d'absence.
   * @param {boolean} decrease Si true alors diminue le nombre d'heure par `number` sinon augmente.
   * @param {number} number Nombre d'heures absence
   */
  updateTotalHoursAbsences(updatedAbsence, decrease, number) {
    let apprenant = this.recapAbsences[updatedAbsence.code_apprenant];
    if(decrease) {
      apprenant.nb_total_h_absences = apprenant.nb_total_h_absences - number;
    }
    else {
      apprenant.nb_total_h_absences = apprenant.nb_total_h_absences + number;
    }
    this.notify();
  }
}
