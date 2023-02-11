class Subject extends EventTarget {
  constructor() {
    super();
  }

  notify(eventName = "draw") {
    this.dispatchEvent(new Event(eventName));
  }
}