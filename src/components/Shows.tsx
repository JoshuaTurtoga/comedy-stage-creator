import { Button } from "@/components/ui/button";
import { Calendar, MapPin } from "lucide-react";

const shows = [
  {
    date: "Jan 15, 2025",
    venue: "The Comedy Store",
    city: "Los Angeles, CA",
    status: "On Sale",
  },
  {
    date: "Jan 22, 2025",
    venue: "Zanies Comedy Club",
    city: "Chicago, IL",
    status: "On Sale",
  },
  {
    date: "Feb 5, 2025",
    venue: "Gotham Comedy Club",
    city: "New York, NY",
    status: "Few Left",
  },
  {
    date: "Feb 14, 2025",
    venue: "The Improv",
    city: "Miami, FL",
    status: "On Sale",
  },
  {
    date: "Mar 1, 2025",
    venue: "Punchline Comedy Club",
    city: "San Francisco, CA",
    status: "Coming Soon",
  },
];

const Shows = () => {
  return (
    <section id="shows" className="py-24 bg-background">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="font-display text-5xl md:text-6xl text-foreground mb-4">
            UPCOMING <span className="text-primary">SHOWS</span>
          </h2>
          <p className="text-muted-foreground max-w-xl mx-auto">
            Catch Mike live on stage. New dates added regularly.
          </p>
        </div>

        <div className="max-w-4xl mx-auto space-y-4">
          {shows.map((show, index) => (
            <div
              key={index}
              className="group bg-card border border-border rounded-lg p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:border-primary/50 hover:glow-box transition-all duration-300"
            >
              <div className="flex items-center gap-6">
                <div className="flex items-center gap-2 text-primary">
                  <Calendar size={18} />
                  <span className="font-medium">{show.date}</span>
                </div>
                <div>
                  <h3 className="font-semibold text-foreground group-hover:text-primary transition-colors">
                    {show.venue}
                  </h3>
                  <div className="flex items-center gap-1 text-muted-foreground text-sm">
                    <MapPin size={14} />
                    {show.city}
                  </div>
                </div>
              </div>
              <div className="flex items-center gap-4">
                <span
                  className={`text-sm font-medium px-3 py-1 rounded-full ${
                    show.status === "Few Left"
                      ? "bg-destructive/20 text-destructive"
                      : show.status === "Coming Soon"
                      ? "bg-muted text-muted-foreground"
                      : "bg-primary/20 text-primary"
                  }`}
                >
                  {show.status}
                </span>
                <Button
                  variant={show.status === "Coming Soon" ? "secondary" : "default"}
                  size="sm"
                  disabled={show.status === "Coming Soon"}
                >
                  {show.status === "Coming Soon" ? "Notify Me" : "Get Tickets"}
                </Button>
              </div>
            </div>
          ))}
        </div>

        <div className="text-center mt-12">
          <Button variant="outline" size="lg">
            View All Shows
          </Button>
        </div>
      </div>
    </section>
  );
};

export default Shows;
