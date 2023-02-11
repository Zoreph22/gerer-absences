class RecapAbsencesModel extends Subject{
  constructor() {
    super();
    this.recapAbsences = {};

    this.fetch();
  }

  getAbsences() {
    return this.recapAbsences;
  }

  getApprenantCompleteName(codeApprenant){
    let apprenant = this.recapAbsences[codeApprenant];
    let name = apprenant.nom_apprenant.toUpperCase() + " " + apprenant.prenom_apprenant;
    return name;
  }

  async fetch() {
    let payload = await fetch("http://localhost/api/recapAbsences", { type: "GET" });
    let recap = await payload.json();
    recap.forEach((element) => {
      this.recapAbsences[element.code_apprenant] = element;
    });
    this.notify();
    return recap;
  }

  decreaseTotalHoursAbsences(codeApprenant, nbHeureAbsence) {
    let apprenant = this.recapAbsences[codeApprenant];
    apprenant.nb_total_absences = apprenant.nb_total_absences - nbHeureAbsence;
    this.notify();
  }
}
