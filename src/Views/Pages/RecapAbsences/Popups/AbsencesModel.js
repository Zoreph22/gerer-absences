class AbsencesModel extends Subject {
  constructor() {
    super();
    this.absences = {};
  }

  getAbsencesByCodeApprenant(codeApprenant){
    return this.absences[codeApprenant];
  }

  getAbsenceByCodeAbsence(codeAbsence, codeApprenant){
    let absences = this.getAbsencesByCodeApprenant(codeApprenant);
    for(const element of absences){
      if(element.code_absence == codeAbsence){
        return element;
      }
    };
  }

  isApprenantFetched(codeApprenant){
    if(this.absences[codeApprenant]){
      return true;
    }
    return false;
  }

  async fetch(codeApprenant) {
    if(this.isApprenantFetched(codeApprenant)){
      return this.getAbsencesByCodeApprenant(codeApprenant);
    }
    let payload = await fetch("http://localhost/api/allAbsencesOfApprenant?id=" + codeApprenant, {
      type: "GET",
    });
    let absences = await payload.json();
    this.absences[codeApprenant] = absences;
    return absences;
  }

  async deleteAbsence(codeAbsence, codeApprenant) {
    await fetch("http://localhost/api/deleteAbsence?id=" + codeAbsence, { type: "DELETE" });
    this.absences[codeApprenant] = this.absences[codeApprenant].filter(
      (element) => element.code_absence != codeAbsence
    );
    this.notify();
  }

  updateAbsence() {}

  createAbsence() {}
}
