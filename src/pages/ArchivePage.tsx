import { useParams, Link } from "react-router-dom";
import { ArrowLeft } from "lucide-react";
import { Button } from "@/components/ui/button";

const eraData: Record<string, { title: string; year: string; description: string }> = {
  "unfiltered-2024": {
    title: "Unfiltered Era",
    year: "2024",
    description: "Netflix Special & National Tour",
  },
  "podcast-2023": {
    title: "Podcast Era",
    year: "2023",
    description: "The Laugh Track Launch",
  },
  "rising-star-2022": {
    title: "Rising Star Era",
    year: "2022",
    description: "Comedy Central Debut",
  },
  "club-days-2021": {
    title: "Club Days Era",
    year: "2021",
    description: "Building the Foundation",
  },
  "virtual-2020": {
    title: "Virtual Era",
    year: "2020",
    description: "Live from the Living Room",
  },
  "beginning-2019": {
    title: "The Beginning",
    year: "2019",
    description: "First Open Mic",
  },
};

const ArchivePage = () => {
  const { slug } = useParams<{ slug: string }>();
  const era = slug ? eraData[slug] : null;

  if (!era) {
    return (
      <div className="min-h-screen bg-background flex items-center justify-center">
        <div className="text-center">
          <h1 className="font-display text-4xl font-bold text-primary mb-4">
            Era Not Found
          </h1>
          <Link to="/#archive">
            <Button variant="outline">
              <ArrowLeft className="w-4 h-4 mr-2" />
              Back to Archive
            </Button>
          </Link>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-background">
      {/* Hero */}
      <div className="relative h-[60vh] min-h-[400px] bg-gradient-to-br from-primary via-primary/90 to-burgundy-light flex items-center justify-center">
        {/* Back button */}
        <Link
          to="/#archive"
          className="absolute top-8 left-8 z-10 flex items-center gap-2 text-primary-foreground/80 hover:text-accent transition-colors font-body text-sm uppercase tracking-widest"
        >
          <ArrowLeft className="w-4 h-4" />
          Back to Archive
        </Link>

        {/* Placeholder */}
        <div className="absolute inset-0 flex items-center justify-center opacity-20">
          <div className="w-64 h-64 border-2 border-dashed border-primary-foreground/30 rounded-full flex items-center justify-center">
            <span className="font-body text-sm uppercase tracking-widest text-primary-foreground/50">
              Era Hero Image
            </span>
          </div>
        </div>

        {/* Content */}
        <div className="relative z-10 text-center px-6">
          <p className="font-body text-sm uppercase tracking-[0.3em] text-accent mb-4">
            {era.year}
          </p>
          <h1 className="font-display text-5xl md:text-7xl lg:text-8xl font-bold text-primary-foreground mb-4">
            {era.title}
          </h1>
          <p className="font-body text-xl text-primary-foreground/80">
            {era.description}
          </p>
        </div>
      </div>

      {/* Content Placeholder */}
      <div className="container mx-auto px-6 py-24">
        <div className="max-w-4xl mx-auto">
          <div className="bg-muted/50 rounded-2xl p-12 text-center">
            <h2 className="font-display text-3xl font-bold text-primary mb-4">
              Coming Soon
            </h2>
            <p className="font-body text-muted-foreground mb-8">
              This era's content is being curated. Check back soon for photos, 
              videos, and memories from the {era.title}.
            </p>
            <div className="grid sm:grid-cols-3 gap-6">
              {[1, 2, 3].map((i) => (
                <div
                  key={i}
                  className="aspect-square bg-card rounded-xl border-2 border-dashed border-border flex items-center justify-center"
                >
                  <span className="font-body text-xs uppercase tracking-widest text-muted-foreground">
                    Content {i}
                  </span>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="py-8 bg-foreground text-background">
        <div className="container mx-auto px-6 text-center">
          <p className="font-body text-sm text-background/60">
            © {new Date().getFullYear()} Jane Doe. All rights reserved.
          </p>
        </div>
      </footer>
    </div>
  );
};

export default ArchivePage;
