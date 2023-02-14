/**
 * Classe Sujet qui peut être observer par une notification.
 */
class Subject extends EventTarget {
  constructor() {
    super();
  }

  /**
   * Permet d'émettre un evènement qui peut être récupérer par des observateur.
   *
   * @param {string} eventName Nom de l'evènement. Par défaut "draw"
   */
  notify(eventName = "draw") {
    this.dispatchEvent(new Event(eventName));
  }
}