/**
 * Classe pour la vue de la popup des modification, création des absences.
 */
class AbsenceEditView {
  constructor(absencesModel) {
    this.absencesModel = absencesModel;

    this.codeApprenant = null;
    this.absence = null;
    this.editMode = false;
  }

  /**
   * Afficher la popup d'édition.
   *
   * @param {number} codeApprenant Code de l'apprenant.
   * @param {string} name Nom de l'apprenant.
   * @param {number} [absenceId=null] Id de l'absence à éditer (null par défaut).
   */
  show(codeApprenant, name, absenceId = null) {
    this.codeApprenant = codeApprenant;
    if (absenceId) {
      this.absence = this.absencesModel.getAbsenceByCodeAbsence(absenceId, codeApprenant);
    }

    document.getElementById("apprenantName").innerText = name;

    if (absenceId) {
      this.editMode = true;
      this.fill();
      document.getElementById("editTitle").innerText = "Modification Absence";
      document.getElementById("confirm").innerText = "Modifier";
      document.getElementById("bottomSection").classList.toggle("bsHidden", false);
    } else {
      this.editMode = false;
      this.empty();
      document.getElementById("backdrop").classList.toggle("hidden");
      document.getElementById("editTitle").innerText = "Création Absence";
      document.getElementById("confirm").innerText = "Créer";
      document.getElementById("bottomSection").classList.toggle("bsHidden", true);
    }

    const popup = document.getElementById("editAbsences");
    popup.classList.toggle("editHidden");
  }

  /**
   * Remplir les champs avec les données de l'absence
   */
  fill() {
    this.empty();
    document.getElementById("date").value = this.absence.date_absence;
    document.getElementById("nbHeuresAbsences").value = this.absence.nb_heures_absence;
  }

  /**
   * Vider les champs
   */
  empty() {
    document.getElementById("date").value = "";
    document.getElementById("nbHeuresAbsences").value = "";
  }

  /**
   * Obtenir les nouvelles valeurs des champs (en mode édition).
   *
   * @returns {Object} Objet contenant les nouvelles valeurs.
   */
  getModifiedFieldValue() {
    const updateAbsence = {
      ...this.absence,
      date_absence: document.getElementById("date").value,
      nb_heures_absence: +document.getElementById("nbHeuresAbsences").value,
    };
    return updateAbsence;
  }

  /**
   * Obtenir les valeurs des champs (en mode création).
   *
   * @returns {Object} Objet contenant les valeurs des champs.
   */
  getFieldValue() {
    const absence = {
      code_apprenant: this.codeApprenant,
      date_absence: document.getElementById("date").value,
      nb_heures_absence: +document.getElementById("nbHeuresAbsences").value,
    };
    return absence;
  }

  /**
   * Lie un écouteur d'événement pour la suppression de l'absence.
   *
   * @param {function} handler Fonction de gestion de l'événement de suppression.
   */
  bindDeleteAbsence(handler) {
    document.getElementById("supprimer").addEventListener("click", (event) => {
      if (confirm("Voulez vous vraiment supprimer l'absence ?")) {
        handler(this.codeApprenant, this.absence.code_absence, this.editMode);
      }
    });
  }

  /**
   * Lie un écouteur d'événement pour la confirmation de l'édition de l'absence.
   *
   * @param {function} handler La fonction de gestion de l'événement de confirmation d'édition.
   */
  bindConfirmEditAbsence(handler) {
    document.getElementById("form-EditPopup").addEventListener("submit", (event) => {
      event.preventDefault();

      if (this.editMode) {
        handler(this.getModifiedFieldValue(), this.editMode);
      } else {
        handler(this.getFieldValue(), this.editMode);
      }
    });
  }

  /**
   * Lie un écouteur d'événement pour la fermeture de la popup d'édition.
   *
   * @param {function} handler La fonction de gestion de l'événement de fermeture.
   */
  bindCloseEdit(handler) {
    document.getElementById("annuler").addEventListener("click", () => {
      handler(this.editMode);
    });
  }

  /**
   * Fermer la popup
   */
  close() {
    if(!this.editMode) {
      document.getElementById("backdrop").classList.toggle("hidden");
    }
    const popup = document.getElementById("editAbsences");
    popup.classList.toggle("editHidden");
  }
}
